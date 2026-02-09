<?php
/**
 * Finalized Clubs Ranking Render
 */
$league_id = $attributes['leagueId'] ?? '39';
$api_key = '870c2dab5d172f0ba00839af79d15e33';

// Using v3 in the key to ensure we clear any old, broken data
$cache_key = 'clubs_ranking_v3_' . $league_id;

// Allow manual refresh via URL: yoursite.com/page/?refresh=1
if (isset($_GET['refresh'])) { 
    delete_transient($cache_key); 
}

$standings = get_transient($cache_key);

if (false === $standings) {
    $seasons_to_try = ['2025', '2024'];
    
    foreach ($seasons_to_try as $season) {
        $api_url = "https://v3.football.api-sports.io/standings?league=$league_id&season=$season";
        $response = wp_remote_get($api_url, [
            'timeout'   => 15,
            'sslverify' => false,
            'headers'   => [
                'x-apisports-key' => $api_key,
                'Content-Type'    => 'application/json',
            ]
        ]);

        if (!is_wp_error($response)) {
            $body = json_decode(wp_remote_retrieve_body($response), true);
            if (isset($body['response'][0]['league']['standings'][0]) && !empty($body['response'][0]['league']['standings'][0])) {
                $standings = $body['response'][0]['league']['standings'][0];
                set_transient($cache_key, $standings, HOUR_IN_SECONDS);
                break;
            }
        }
    }
}

// If standings is STILL empty after trying both years, show an error
if (empty($standings)) {
    echo '<div style="padding:20px; text-align:center; background:#f8f9fa; border-radius:8px; border: 1px solid #ddd;">';
    echo '<strong>Ranking data currently unavailable.</strong><br>';
    echo '<small>League: ' . esc_html($league_id) . ' | Check ?refresh=1</small>';
    echo '</div>';
    return;
}

$limited_standings = array_slice($standings, 0, 7);
?>

<div <?php echo get_block_wrapper_attributes(['class' => 'clubs-ranking-container']); ?>>
    <table class="ranking-table">
        <thead>
            <tr>
                <th class="col-club">CLUB</th>
                <th class="col-stat">GP</th>
                <th class="col-stat">W</th>
                <th class="col-stat">D</th>
                <th class="col-stat">L</th>
                <th class="col-stat">GD</th>
                <th class="col-stat">PTS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($limited_standings as $team): ?>
                <tr>
                    <td class="col-club">
                        <span class="rank-number"><?php echo esc_html($team['rank']); ?></span>
                        <img class="team-logo" src="<?php echo esc_url($team['team']['logo']); ?>" width="24" height="24" alt="">
                        <span class="team-name"><?php echo esc_html($team['team']['name']); ?></span>
                    </td>
                    <td class="col-stat"><?php echo esc_html($team['all']['played']); ?></td>
                    <td class="col-stat"><?php echo esc_html($team['all']['win']); ?></td>
                    <td class="col-stat"><?php echo esc_html($team['all']['draw']); ?></td>
                    <td class="col-stat"><?php echo esc_html($team['all']['lose']); ?></td>
                    <td class="col-stat"><?php echo esc_html($team['goalsDiff']); ?></td>
                    <td class="col-stat"><strong><?php echo esc_html($team['points']); ?></strong></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>