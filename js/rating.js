jQuery(function($){
	var goRating = 0;
  //Category Rating click
  $(document).on('click', '.stars i', function(){
    if (goRating === 0){
      //Color Stars after click
      $('.stars-inner').css({'width':'0'})
      $(this).css({'color':'#f56565 !important'});
      $(this).prevAll('.stars i').css({'color':'#f56565 !important'});
      $(this).nextAll('.stars i').css({'color':'transparent !important'});
      
      $('.rating-text').addClass('active');

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
          goRating = 1;
          console.log('yes', data);
        }
      });
    }
  });
});