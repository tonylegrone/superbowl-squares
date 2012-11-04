(function($, window, document, undefined){
  $(function(){

    // Add player
    $('#add-player').submit(function(evt){
      var $name = $('#player-name');
      var $nameList = $('#player-list');
      var index = $nameList.children().length;

      playerHTML  = '<li id="player-index-' + index + '">';
      playerHTML += '  <label><input type="radio" name="player" value="' + index + '" />' + $name.val() + '</label>';
      playerHTML += '  <a href="javascript:;" class="remove-player">remove</a>';
      playerHTML += '</li>';

      $nameList.append(playerHTML);
      $name.val('');
      evt.preventDefault();
    });

  });
})(jQuery, window, document);