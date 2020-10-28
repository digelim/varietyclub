<?php
get_header();

?>

<section class="bg-img relative" id="blog-header" style="background-image: url(<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ) ?: bloginfo('stylesheet_directory') . '/images/blog-archive-header-background.jpg';  ?>););">
  <div class="container width-1000 p-t-190 p-b-190 tab-sm-p-t-120 tab-sm-p-b-120 align-center">
    <h1 class="large color-tertiary tab-sm-font-36 tab-sm-l-h-45"><?php the_title(); ?></h1>
  </div>
</section>

<section class="block-top-padding-large block-bottom-padding-large">
  <?php if ( have_posts() ): ?>
    <?php while ( have_posts() ): ?>
      <?php the_post(); ?>

      <div class="container width-850">
        <div class="row gutter-55 margin-responsive">
          <div class="col-auto mob-md-flex-full">
            <div id="share-buttons" class="align-center">
              <div class="post_like">
                <div id="share-icons" class="row flex-column align-items-center">
                  <!-- Facebook -->
                  <a href="https://www.facebook.com/sharer/sharer.php" onclick="javascript:window.open(this.href + '?u=<?php the_permalink(); ?>', '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook">
                    <svg height="18" viewBox="0 0 10 18" width="10" xmlns="http://www.w3.org/2000/svg">
                      <path d="m14.6234294 1.0037452-2.3985453-.0037452c-2.6946834 0-4.43610617 1.73870978-4.43610617 4.42982429v2.04244561h-2.41163001c-.20839347 0-.37714792.16441435-.37714792.36721701v2.95927089c0 .2028027.16894687.3670298.37714792.3670298h2.41163001v7.4671827c0 .2028026.16875445.3670297.37714791.3670297h3.14649116c.2083935 0 .3771479-.1644143.3771479-.3670297v-7.4671827h2.819758c.2083934 0 .3771479-.1642271.3771479-.3670298l.0011545-2.95927089c0-.09737524-.0398314-.19063076-.1104504-.25954246-.0706191-.06891171-.1668303-.10767455-.2668899-.10767455h-2.8207201v-1.73140663c0-.83218377.2037754-1.25464249 1.3177087-1.25464249l1.6157709-.00056178c.2082011 0 .3769555-.16441434.3769555-.36702974v-2.74785432c0-.20242813-.168562-.36665522-.3765706-.36702974z" fill="#a9a9a9" fill-opacity="0.7" fill-rule="evenodd" transform="translate(-5 -1)"/>
                    </svg>
                  </a>
                  <!-- Twitter -->
                  <a href="https://twitter.com/intent/tweet?text=<?php echo get_permalink(); ?>" target="_blank">
                    <svg height="16" viewBox="0 0 18 16" width="18" xmlns="http://www.w3.org/2000/svg"><path d="m18.9789801 4.36286181c-.0258098-.03070539-.068396-.04112662-.1047141-.02437822-.5381343.24099082-1.1042907.41424368-1.6874078.516595.6190665-.47007167 1.0803245-1.12102603 1.3168528-1.86744625.0114301-.03572991-.0003687-.07480951-.0293125-.09807117-.0291282-.02326166-.0695021-.02623915-.1013957-.00707154-.6972333.41740726-1.4523543.71162077-2.2454526.87482459-.7027639-.73618509-1.6840894-1.15731422-2.699705-1.15731422-2.0655214 0-3.7457394 1.69605432-3.7457394 3.78085754 0 .25215642.0241506.50189362.07208309.74437319-2.86083196-.17827738-5.53583336-1.56467245-7.35468682-3.81658745-.01861993-.02307557-.04682635-.03591601-.07632327-.03293851-.02931256.00223312-.05549107.01898151-.07023952.04447629-.33184029.57465611-.50716257 1.23212373-.50716257 1.90094304 0 1.15917516.52172667 2.24298253 1.41013685 2.95813907-.45738653-.0554558-.90408042-.20079467-1.30689765-.42652584-.02710029-.01544574-.06083739-.01525965-.08793768.00055828-.02710029.01563184-.04424537.04466239-.04498279.07629825l-.00036871.04838426c0 1.66479065 1.08677693 3.12655348 2.63296829 3.61188478-.40724177.0662493-.82978506.061783-1.24513848-.0182371-.03060305-.0057689-.06268095.0048384-.0836975.0286584-.02083219.0238199-.02783771.0571306-.01825121.0872777.46365462 1.4608324 1.75193234 2.485276 3.25148171 2.612936-1.25085351.9250698-2.72938633 1.4124482-4.29161665 1.4124482-.28777926 0-.57758645-.0173067-.86149424-.0509896-.04055826-.0046523-.08074781.0197259-.09475884.0589916-.01401103.0396378.00092178.083928.03594936.1064453 1.69054189 1.0944147 3.64526552 1.6726066 5.65308359 1.6726066 6.56767224 0 10.49223674-5.3851679 10.49223674-10.59131397 0-.14496668-.0027654-.28918898-.0084804-.4330391.708479-.52310827 1.3166685-1.1634553 1.8070547-1.90466491.0219383-.03312461.0195417-.07722872-.0060837-.10812021z" fill="#a9a9a9" fill-opacity="0.7" fill-rule="evenodd" transform="translate(-1 -2)"/></svg>
                  </a>
                  <!-- Email -->
                  <a href="mailto:?body=<?php the_permalink(); ?>" target="_blank">
                    <svg height="14" viewBox="0 0 18 14" width="18" xmlns="http://www.w3.org/2000/svg"><path d="m10 166c0-.552285.4477153-1 1-1h16c.5522847 0 1 .447715 1 1v.125l-7.9362915 4.984378c-.6503278.408438-1.4770892.408438-2.127417 0l-7.9362915-4.984378zm0 2.375 7.9400021 4.962501c.6485406.405338 1.4714552.405338 2.1199958 0l7.9400021-4.962501v9.625c0 .552285-.4477153 1-1 1h-16c-.5522847 0-1-.447715-1-1z" fill="#a9a9a9" fill-opacity="0.7" fill-rule="evenodd" transform="translate(-10 -165)"/></svg>
                  </a>
                  <!-- Print -->
                  <a href="#" onclick="print();">
                    <svg height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m17.5 100.5v-4.4824219c0-.3316406-.1316405-.6492187-.3660155-.8839843l-1.7679688-1.7675782c-.234375-.234375-.5523438-.3660156-.8839844-.3660156h-10.73203128c-.69023438 0-1.25000002.5597656-1.25000002 1.25v6.25c-1.38085937 0-2.5 1.119141-2.5 2.5v4.375c0 .345313.2796875.625.625.625h1.875v3.75c0 .690234.55976564 1.25 1.25000002 1.25h12.50000008c.6902344 0 1.2499999-.559766 1.2499999-1.25v-3.75h1.8750001c.3453125 0 .6249999-.279687.6249999-.625v-4.375c0-1.380859-1.1191405-2.5-2.5-2.5zm-2.5 10h-9.99999998v-3.75h9.99999998zm0-8.75h-9.99999998v-6.25h7.49999998v1.875c0 .3453125.2796876.625.6250001.625h1.8749999zm1.8750001 2.8125c-.5175781 0-.9375-.419922-.9375-.9375 0-.517969.4199219-.9375.9375-.9375s.9375.419531.9375.9375c0 .517578-.4199219.9375-.9375.9375z" fill="#a9a9a9" fill-opacity="0.7" transform="translate(0 -93)"/></svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col mob-md-flex-full mob-md-order-first">
            <article id="post-article">
              <?php the_content(); ?>
            </article>
          </div>
        </div>
      </div>

    <?php endwhile; ?>
  <?php endif; ?>
</section>

<section class="bg-secondary p-t-60 p-b-60">
  <div class="container width-1100">
    <div class="row justify-content-between align-items-center tab-md-block tab-md-align-center margin-responsive">
      <div class="col">
        <h1 class="medium type-medium m-b-5 tab-md-font-35">Get Business Development Assessment</h1>
        <p class="font-17">Find our how well you're strategically positioned today.</p>
      </div>
      <div class="col-auto">
        <a href="#" target="_blank" class="btn medium primary">Get BD Assessment</a>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
