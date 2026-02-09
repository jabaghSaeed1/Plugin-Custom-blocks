<?php
$all_fixtures = get_weekly_top_matches();
?>

<div <?php echo get_block_wrapper_attributes(['class' => 'match-schedule-slider-wrapper']); ?>>
    <div class="schedule-header">
        <h2 class="schedule-title">Match Schedule</h2>
        <span class="schedule-subtitle">Major Leagues</span>
    </div>

    <div class="match-slick-slider">
        <?php if (!empty($all_fixtures)) : ?>
            <?php 
            // Chunk the matches into groups of 3 for each slide
            $chunks = array_chunk($all_fixtures, 3); 
            foreach ($chunks as $slide_matches) : 
            ?>
                <div class="match-slide">
                    <?php foreach ($slide_matches as $m) : 
                        $home = $m['teams']['home'];
                        $away = $m['teams']['away'];
                        $date = new DateTime($m['fixture']['date']);
                    ?>
                        <div class="match-row">
                            <div class="league-info">
                                <img src="<?php echo esc_url($m['league']['logo']); ?>" class="mini-logo">
                                <span><?php echo esc_html($m['league']['name']); ?> • <?php echo $date->format('D, M j'); ?></span>
                            </div>
                            
                            <div class="teams-flex">
                                <div class="team home">                                 
                                    <img src="<?php echo esc_url($home['logo']); ?>" class="team-logo-small">
                                    <span class="t-name"><?php echo esc_html($home['name']); ?></span>
                                </div>

                                <div class="match-meta">
                                    <span class="vs-badge">VS</span>
                                    <span class="match-time"><?php echo $date->format('H:i'); ?></span>
                                </div>

                                <div class="team away">                                  
                                    <img src="<?php echo esc_url($away['logo']); ?>" class="team-logo-small">
                                    <span class="t-name"><?php echo esc_html($away['name']); ?></span>                                   
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No matches found for the selected criteria.</p>
        <?php endif; ?>
    </div>
</div>