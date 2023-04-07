$(function () {
  $('.modalopen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });
  $(document).on('click', function (e) {
    if (!$(e.target).closest('.inner-content').length) {
      $('.js-modal').fadeOut();
    }
  });

  $('.modalClose').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});
