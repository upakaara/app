@foreach ($comments as $comment)
    <section class="g-mb-30">
      @if (Auth::user()->id === $comment->author)
        <!-- Chat. Message Area. Message (From). -->
        <div class="media g-mb-12">
          <!-- Chat. Message Area. Message. Avatar. -->
          <div class="d-flex align-self-end g-mr-12">
            <img class="rounded-circle g-width-36 g-height-36" src="../../assets/img-temp/200x200/img2.jpg" alt="alt">
          </div>
          <!-- End Chat. Message Area. Message. Avatar. -->

          <!-- Chat. Message Area. Message. Body. -->
          <div class="media-body">
            <div class="d-inline-block g-width-170 g-width-auto--sm g-bg-gray-light-v8 g-font-size-12 g-font-size-default--lg g-color-gray-dark-v6 g-rounded-10 g-pa-10-15">
              <p class="mb-0">{{ $comment->comment }}</p>
            </div>
            @if ($comment->image_url) 
              <div class="row g-mx-minus-5">
                <div class="col-sm-4 g-px-5 g-mb-10 g-mb-0--md">
                  <a class="d-block u-link-v5 g-parent g-pos-rel" href="#!">
                    <img class="img-fluid g-rounded-2" src="../../assets/img-temp/900x600/img2.jpg" alt="alt">

                    <div class="g-pos-abs g-top-0 w-100 h-100 g-bg-gray-dark-v6 opacity-0 g-opacity-0_7--parent-hover g-rounded-2 g-transition--ease-in g-transition-0_2">
                      <i class="hs-admin-import g-absolute-centered g-font-size-24 g-color-white"></i>
                    </div>
                  </a>
                </div>
              </div>
            @endif
          </div>
          <!-- End Chat. Message Area. Message. Body. -->
        </div>
      @else
        <!-- Chat. Message Area. Message (To). -->
        <div class="media g-mb-12">
          <!-- Chat. Message Area. Message. Body. -->
          <div class="media-body">
            <div class="d-inline-block g-width-170 g-width-auto--sm g-bg-lightblue-v6 g-font-size-12 g-font-size-default--lg g-color-gray-dark-v6 g-rounded-10 g-pa-10-15">
              <p class="mb-0">{{ $comment->comment }}</p>
            </div>
          </div>
          <!-- End Chat. Message Area. Message. Body. -->

          <!-- Chat. Message Area. Message. Avatar. -->
          <div class="d-flex align-self-end g-ml-12">
            <img class="rounded-circle g-width-36 g-height-36" src="../../assets/img-temp/200x200/img7.jpg" alt="alt">
          </div>
          @if ($comment->image_url) 
            <div class="row g-mx-minus-5">
              <div class="col-sm-4 g-px-5 g-mb-10 g-mb-0--md">
                <a class="d-block u-link-v5 g-parent g-pos-rel" href="#!">
                  <img class="img-fluid g-rounded-2" src="../../assets/img-temp/900x600/img2.jpg" alt="alt">

                  <div class="g-pos-abs g-top-0 w-100 h-100 g-bg-gray-dark-v6 opacity-0 g-opacity-0_7--parent-hover g-rounded-2 g-transition--ease-in g-transition-0_2">
                    <i class="hs-admin-import g-absolute-centered g-font-size-24 g-color-white"></i>
                  </div>
                </a>
              </div>
            </div>
          @endif
          <!-- End Chat. Message Area. Message. Avatar. -->
        </div>
      @endif
    </section>
@endforeach
