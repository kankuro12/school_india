<style>
    .holder{
        position:fixed;
        bottom:25px;
        left: 0;
        right: 0;
        display: flex;
        justify-content: center;
        margin-top:15px;
        
    }
    .holder-inner{
        background: white;
        border-radius: 5px ;
        overflow: hidden;
        width:300px;
        height: 35px;
        display: flex;
       
    }
    .holder-inner>button{
        flex: 1;
        border:none;
        background: transparent;
        border:1px  var(--color-yellow-lite) solid;
        color: var(--color-yellow-lite)
    }
</style>
<div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl d-flex justify-content-center">
        <div class="modal-content d-block text-center justify-content-center" style="background: transparent;">
            <div id="modal-image-holder" class="text-center">
                <img  onload="imageChanged()" class="w-100" alt="">
                <div class="holder">
                    <div class="holder-inner">

                        <button class=" prev">
                            <i class="fas fa-chevron-circle-left"></i>
                        </button>
                        <button class=" next">
                            <i class="fas fa-chevron-circle-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="{{ asset('front/js/lazy.js') }}"></script>
<script>
    const galleryelem = document.querySelectorAll('.gallery .item img');
    var index=0;
    function imageChanged() {
        let ele=$('#modal-image-holder>img');
        ele.parent().removeAttr('style');
        let height=ele.height();
        let width=ele.width();
        let wh=window.innerHeight;
        if(height>wh){
            let nh=wh-150;
            const ratio=nh/height;
            const nw=width*ratio;
            ele.parent().attr('style', "width:"+nw+"px !important;display:inline-block;");
            ele.parent().parent().attr('style', "width:"+nw+"px !important;display:inline-block;");
            // $(selector).css(propertyName, value);
            // ele.css('width', nw+'px !important');
            // ele.height(nh);
            // ele.width(nw);
        }else{
        }
    }
    $(document).ready(function() {
        $('#modal-image-holder>img').attr('src', galleryelem[index].dataset.org);
        $('#gallery').masonry({
            itemSelector: '.item',
        });
        $('.gallery .item').click(function(e) {
            e.preventDefault();
            index = parseInt( this.dataset.index);
            console.log(index, galleryelem[index]);
            $('#modal-image-holder>img').attr('src', galleryelem[index].dataset.org);
            $('#staticBackdrop').modal('show');
            imageChanged();
        });
        $('#staticBackdrop')[0].addEventListener('shown.bs.modal', function (event) {
            imageChanged();
        });

        $('#modal-image-holder .next').click(function(e) {
            e.preventDefault();
            index =index+ 1;
            if (index >= galleryelem.length) {
                index = 0;
            }
            $('#modal-image-holder>img').attr('src', galleryelem[index].dataset.org);
            imageChanged();

        });
        $('#modal-image-holder .prev').click(function(e) {
            e.preventDefault();
            index -= 1;
            if (index < 0) {
                index = galleryelem.length - 1;
            }
            $('#modal-image-holder>img').attr('src', galleryelem[index].dataset.org);
            imageChanged();

        });
    });
</script>
