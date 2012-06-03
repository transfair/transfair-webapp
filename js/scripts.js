$('fieldset').each(function(){
    var $self = $(this);
    var $fieldsetWrapper = $('<div/>');
    var $fieldlabel = $('<a/>');
    var $fieldsetContents = $self.contents();
    
    $self.append($fieldsetWrapper);
    $fieldsetWrapper.append($fieldsetContents);
    $fieldlabel.html($self.find('legend').html()).attr({
        'class':'fieldLabel',
        'href':'#' + $self.attr('id')
    }).on('click',function(event){
        event.preventDefault();
    });
    $fieldsetWrapper.before($fieldlabel);
    $fieldsetWrapper.hide().parent().addClass('closed');
});
$('fieldset div').eq(0).show().parent().removeClass('closed');
$('fieldset').eq(0).find('a.fieldLabel').attr('tabindex',-1)

$(document).on('click', '.closed a.fieldLabel', function(){
    $('fieldset div').slideUp().parent().addClass('closed');
    $('a.fieldLabel').attr('tabindex',0)
    $(this).next().slideDown().parent().removeClass('closed');
    $(this).attr('tabindex',-1)
})