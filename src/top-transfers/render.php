<?php $transfers = get_recent_top_transfers(); ?>

<div <?php echo get_block_wrapper_attributes(['class' => 'transfer-list-wrapper']); ?>>
    <div class="transfer-header">
        <h2 class="title">Latest Transfers</h2>
    </div>

    <div class="transfer-grid"> 
        <?php foreach ($transfers as $t) : ?>
            <div class="transfer-card">
                <div class="player-info">
                    <span class="player-name"><?php echo esc_html($t['player']); ?></span>
                    <span class="transfer-date"><?php echo date('M j', strtotime($t['date'])); ?></span>
                </div>
                
                <div class="movement-flex">
                    <div class="t-team">
                        <img src="<?php echo esc_url($t['from_logo']); ?>" class="t-logo" alt="From">
                        <span class="t-team-name"><?php echo esc_html($t['from']); ?></span>
                    </div>
                    
                    <div class="transfer-arrow">→</div>

                    <div class="t-team">
                        <img src="<?php echo esc_url($t['to_logo']); ?>" class="t-logo" alt="To">
                        <span class="t-team-name"><?php echo esc_html($t['to']); ?></span>
                    </div>
                </div>
                
                <div class="transfer-footer">
                    <span class="transfer-type"><?php echo esc_html($t['type']); ?></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>