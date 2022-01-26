<div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div id="modal-image-holder">
                <span class="prev">
                    <i class="fas fa-chevron-circle-left"></i>
                </span>
                <img src="/front/basicimage.jpg" class="w-100" alt="">
                <span class="next">
                    <i class="fas fa-chevron-circle-right"></i>
                </span>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="{{ asset('front/js/lazy.js') }}"></script>
<script>
    const galleryelem = document.querySelectorAll('.gallery .item img');
    var index=0;
    $(document).ready(function() {
        lazy.init('.gallery .item>img');
        $('#modal-image-holder>img').attr('src', galleryelem[index].src);
        $('#gallery').masonry({
            itemSelector: '.item',
        });
        $('.gallery .item').click(function(e) {
            e.preventDefault();
            index = this.dataset.index;
            console.log(index, galleryelem[index]);
            $('#modal-image-holder>img').attr('src', galleryelem[index].src);
            $('#staticBackdrop').modal('show');
        });

        $('#modal-image-holder>.next').click(function(e) {
            e.preventDefault();
            index += 1;
            if (index >= galleryelem.length) {
                index = 0;
            }
            $('#modal-image-holder>img').attr('src', galleryelem[index].src);

        });
        $('#modal-image-holder>.prev').click(function(e) {
            e.preventDefault();
            index -= 1;
            if (index < 0) {
                index = galleryelem.length - 1;
            }
            $('#modal-image-holder>img').attr('src', galleryelem[index].src);

        });
    });
</script>
