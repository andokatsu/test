// $("li").on("click", function(){
//     $(this).addClass("checked");
//   })

  // 画像がクリックされた時の処理です。
$('img').click(function() {
  var $imageList = $('img');

  // 現在の選択を解除します。
  $imageList.find('img.checked').removeClass('checked');

  // チェックを入れた状態にします。
  $(this).addClass('checked');
});