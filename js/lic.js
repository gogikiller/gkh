function op_o(ind)
    {
    $('#m_l_s li a').removeClass();    
    $('#'+ind+'_a').addClass('active');
    $('.b-form').hide();
    $('#'+ind).show();    
    console.log(ind);
    }