jQuery(function($){
	console.log('rating');
  //Category Rating click
  $(document).on('click', '.stars i', function(){
  	var catId = $('.cat_id').val();
  	var categoryRatingOld = $('.cat_rating_old').val();
  	var categoryRatingCount = $('.cat_rating_count').val();
  	var categoryRatingNew = $(this).data('value');
  	console.log(categoryRatingCount);
  	var button = $(this),
      data = {
        'action': 'rating_category_back',
        'catId': catId,
        'categoryRatingNew': categoryRatingNew,
        'categoryRatingOld': categoryRatingOld,
        'categoryRatingCount': categoryRatingCount,
      };

    $.ajax({
      url: rating_params.ajaxurl, // AJAX handler
      data: data,
      type: 'POST',
      beforeSend : function ( xhr ) {
        console.log('отправляю');
      },
      success : function( data ){

        console.log('yes', data);
      }
    });
  });
});