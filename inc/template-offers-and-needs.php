<?php get_header();
?><main>
    <div class="banner"><h1 class="centered-text">Offers and Needs</h1></div>
    <br>
    <a class="no-decoration tomc-community-offers-and-needs-link" href="<?php echo esc_url(site_url('/community-offers'));?>"><span class="purple-span">Community Offers</span></a>
    <a class="no-decoration tomc-community-offers-and-needs-link" href="<?php echo esc_url(site_url('/community-needs'));?>"><span class="blue-span">Community Needs</span></a>
    <a class="no-decoration tomc-community-offers-and-needs-link" href="<?php echo esc_url(site_url('/my-offers'));?>"><span class="purple-span">My Offers</span></a>
    <a class="no-decoration tomc-community-offers-and-needs-link" href="<?php echo esc_url(site_url('/my-needs'));?>"><span class="blue-span">My Needs</span></a>
</main>

<?php get_footer();
?>