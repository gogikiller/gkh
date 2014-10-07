$(document).ready(function() {

    setLabel($('.g-input-undo-label'));

    $('.g-input-undo-label').live('focus', function(){
        $(this).prev("label").css('display', 'none');
    }).live('blur', function(){
        setLabel($(this));
    }).live('change', function(){
        setLabel($(this));
    });

    $('#i-panel-zkh_menu > ul > li > a').click(function(){
        $(this).parent().toggleClass('selected').find('ul').slideToggle();
        return false;
    });
    $(".chosen-select").chosen(); 
    $(".chosen-select-deselect").chosen({allow_single_deselect:true});
    $('.b-ico-4').css('cursor','help');
    //$('.b-ico-4').click(function (){window.location.href='25.html'});
    if($('.b-ico-4').length)
   		$('.b-ico-4').tipTip({defaultPosition:'right'});
    if($('#ed').length)
        CKEDITOR.replace('ed');
    if($('#ed2').length)
        CKEDITOR.replace('ed2',{customConfig: '../js/ck.js'});
    if($('#big_rating').length)
        $('#big_rating').raty({number:10,
        hints:['не удовлетворительно','не удовлетворительно','не удовлетворительно','не удовлетворительно', 'удовлетворительно','удовлетворительно','удовлетворительно','отлично','отлично','отлично'],score:6,
    starOff:'img/1r.png',
    iconRange : [
    { range : 1, on: 'img/2r.png',},
    { range : 2, on: 'img/2r.png' },
    { range : 3, on: 'img/2r.png' },
    { range : 4, on: 'img/2r.png' },
    { range : 5, on: 'img/3r.png' },
    { range : 6, on: 'img/3r.png' },
    { range : 7, on: 'img/3r.png' },
    { range : 8, on: 'img/4r.png' },
    { range : 9, on: 'img/4r.png' },
    { range : 10, on: 'img/4r.png' }
  ]
});
//scoreName:  'entity.score', hintList:['не удовлетворительно','не удовлетворительно','не удовлетворительно','не удовлетворительно', 'удовлетворительно','удовлетворительно','удовлетворительно','отлично','отлично','отлично']
});
// *** конец DOM загрузки ***********************************************


function setLabel(nod) 
{
    var value;
    nod.each(function(index){
        value = $(this).val();
        if(!value){
            $(this).prev("label").css('display', 'inline');
        }
        else{
            $(this).prev("label").css('display', 'none');
        }
    });
}