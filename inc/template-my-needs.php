<?php get_header();
global $wpdb;
$user = wp_get_current_user();
$userid = $user->ID;
$needs_table = $wpdb->prefix . "tomc_needs";
$query = 'select *
from %i
where createdby = %d
order by createddate';
$results = $wpdb->get_results($wpdb->prepare($query, $needs_table, $userid), ARRAY_A);
?><main>
    <div class="banner"><h1 class="centered-text">My Needs</h1></div>
    <br>
    <span id="tomc-post-need" class="blue-span">Post a Need</span>
    <div id="tomc-my-needs-section">
        <?php if (count($results) > 0){
            for ($i = 0; $i < count($results); $i++){
                ?><p><?php echo $results[$i]['needname']; ?></p>
            <?php }
        } else {
            ?><p class="centered-text">Looks like you haven't posted any needs yet.</p>
        <?php }
    ?></div>
</main>

<div class="hidden search-overlay" id="tomc-add-need-overlay">
    <i class="fa fa-window-close tomc-book-organization__overlay__close" aria-label = "close overlay" id="tomc-add-need-overlay-close"></i>
    <h1 class="centered-text">Post a New Need</h1>
    <div id="tomc-add-event-overlay-body">
        <label for="tomc-new-need-title" class="centered-text block">What would you like to call your need?</label>
        <input type="text" id="tomc-new-need-title" class="block rounded-centered-text-input"></input>
        <label for="tomc-new-need-keywords" class="centered-text block">Enter a list of keywords that relate to your need (up to 200 characters).</label>
        <textarea id="tomc-new-need-keywords" class="block rounded-centered-textarea"></textarea>
        <p id="tomc-add-event-no-title-error" class="centered-text hidden">Give your need a name.</p>
        <button id="tomc-add-need-continue" class="blue-button">continue</button>
    </div>
</div>

<?php get_footer();
?>