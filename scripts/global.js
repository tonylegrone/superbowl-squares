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

	// Games
	console.log(localStorage);
	var gameWrapper = {
		game : null,
		activeGame : localStorage.activeGame = localStorage.activeGame ? 0 : localStorage.activeGame,
		games : localStorage.games ? $.parseJSON(localStorage.games) : false,
		default_game : {
			title : '',
			unitPrice : 1.00,
			teams : {},
			scores : {},
			players : {},
			grid : {}
		}
	};

	function loadGame(gameId) {
		gameWrapper.game = gameWrapper.games[gameId];

		$('[data-obj-path]').each(function(){
			var $this = $(this);
			var objPath = $this.attr('data-obj-path').split('.');

			var obj = gameWrapper;
			for(i in objPath) {
				var o = obj[objPath[i]];

				/*if (o == undefined){
					obj[objPath[i]] = {};
					o = obj[objPath[i]];
				}*/
				//if (i != objPath.length-1){
					obj = o;
				//}
			}

			$this.val(obj);
		});
	}

	function saveGames() {
		gameWrapper.games[gameWrapper.activeGame] = gameWrapper.game;
		localStorage.games = JSON.stringify(gameWrapper.games);
		console.log(gameWrapper);
	}

	if (!gameWrapper.games) {
		gameWrapper.games = [gameWrapper.default_game];
		saveGames();
	}

	$('[data-obj-path]').on('change', function(evt){
		var $this = $(this);
		var objPath = $this.attr('data-obj-path').split('.');

		var obj = gameWrapper;
		for(i in objPath) {
			var o = obj[objPath[i]];

			if (o == undefined){
				obj[objPath[i]] = {};
				o = obj[objPath[i]];
			}
			if (i != objPath.length-1){
				obj = o;
			}
		}

		obj[objPath[i]] = $this.val();

		saveGames();

		evt.preventDefault();
	});

	loadGame(gameWrapper.activeGame);

  });
})(jQuery, window, document);