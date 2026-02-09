<div <?php echo get_block_wrapper_attributes(['class' => 'fan-poll-container']); ?>>
    <div class="poll-header">
        <span class="live-badge">LIVE POLL</span>
        <h3>Who will win the Champions League 2026?</h3>
    </div>

    <div class="poll-options">
        <button class="poll-btn" data-team="Real Madrid">
            <span class="team-name">Real Madrid</span>
            <div class="progress-bar"><div class="fill" style="width: 45%;"></div></div>
            <span class="percentage">45%</span>
        </button>

        <button class="poll-btn" data-team="Man City">
            <span class="team-name">Manchester City</span>
            <div class="progress-bar"><div class="fill" style="width: 38%;"></div></div>
            <span class="percentage">38%</span>
        </button>

        <button class="poll-btn" data-team="Other">
            <span class="team-name">Other / Underdog</span>
            <div class="progress-bar"><div class="fill" style="width: 17%;"></div></div>
            <span class="percentage">17%</span>
        </button>
    </div>
</div>