$(document).ready(function() {
  $('.cart .ql').on('change', function() {
    var ql = $(this).val();
    var pr = $(this).parent().parent().find('.price').html();
    pr = get_num(pr);
    var pr_ql = pr * ql;
    $(this).parent().parent().find('.ql-pr').html(num_form(pr_ql + ''));
    total_pr();
  });
});

function total_pr() {
  var total = 0;
  $('.cart .ql').each(function() {
    var ql = $(this).val();
    var pr = $(this).parent().parent().find('.price').html();
    pr = get_num(pr);
    total += pr * ql;
  });
  $('.cart #total_price').html(num_form(total + ''));
}

function get_num(pr) {
  pr = pr.replace(/\./g, '');
  pr = pr.replace(' VND', '');
  return pr;
}

function num_form(num) {
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(num)) {
    num = num.replace(rgx, '$1' + '.' + '$2');
  }
  num = num + ' VND';
  return num;
}
