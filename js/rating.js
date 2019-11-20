jQuery(function($){
	var goCatRating = 0;
  var goPostRating = 0;
  //Post Rating click
  $(document).on('click', '.stars-post i', function(){
    if (goPostRating === 0){
      //Color Stars after click
      $('.stars-inner').css({'width':'0'})
      $(this).css({'color':'#f56565 !important'});
      $(this).prevAll('.stars i').css({'color':'#f56565 !important'});
      $(this).nextAll('.stars i').css({'color':'transparent !important'});
      
      $('.rating-text').addClass('active');

      var postId = $('.post_id').val();
      var postRatingOld = $('.post_rating_old').val();
      var postRatingCount = $('.post_rating_count').val();
      var postRatingNew = $(this).data('value');
      var button = $(this),
        data = {
          'action': 'rating_post_back',
          'postId': postId,
          'postRatingNew': postRatingNew,
          'postRatingOld': postRatingOld,
          'postRatingCount': postRatingCount,
        };

      $.ajax({
        url: rating_params.ajaxurl, // AJAX handler
        data: data,
        type: 'POST',
        beforeSend : function ( xhr ) {
          console.log('отправляю');
        },
        success : function( data ){
          goPostRating = 1;
          console.log('yes', data);
        }
      });
    }
  });

  //Category Rating click
  $(document).on('click', '.stars-cat i', function(){
    if (goCatRating === 0){
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
          goCatRating = 1;
          console.log('yes', data);
        }
      });
    }
  });
});