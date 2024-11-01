/* Icon Picker */
(function($) {

	$.fn.iconPicker = function( options ) {
		var options = ['dashicons', 'dashicons']; // default font set
		var icons;

		$list = $('');
		function font_set() {
			icons = [
				"blank",	// there is no "blank" but we need the option
				"admin-appearance",
				"admin-collapse",
				"admin-comments",
				"admin-customizer",
				"admin-generic",
				"admin-home",
				"admin-links",
				"admin-media",
				"admin-multisite",
				"admin-network",
				"admin-page",
				"admin-plugins",
				"admin-post",
				"admin-settings",
				"admin-site-alt",
				"admin-site-alt2",
				"admin-site-alt3",
				"admin-site",
				"admin-tools",
				"admin-users",
				"airplane",
				"album",
				"align-center",
				"align-full-width",
				"align-left",
				"align-none",
				"align-pull-left",
				"align-pull-right",
				"align-right",
				"align-wide",
				"amazon",
				"analytics",
				"archive",
				"arrow-down-alt",
				"arrow-down-alt2",
				"arrow-down",
				"arrow-left-alt",
				"arrow-left-alt2",
				"arrow-left",
				"arrow-right-alt",
				"arrow-right-alt2",
				"arrow-right",
				"arrow-up-alt",
				"arrow-up-alt2",
				"arrow-up-duplicate",
				"arrow-up",
				"art",
				"awards",
				"backup",
				"bank",
				"beer",
				"bell",
				"block-default",
				"book-alt",
				"book",
				"buddicons-activity",
				"buddicons-bbpress-logo",
				"buddicons-buddypress-logo",
				"buddicons-community",
				"buddicons-forums",
				"buddicons-friends",
				"buddicons-groups",
				"buddicons-pm",
				"buddicons-replies",
				"buddicons-topics",
				"buddicons-tracking",
				"building",
				"businessman",
				"businessperson",
				"businesswoman",
				"button",
				"calculator",
				"calendar-alt",
				"calendar",
				"camera-alt",
				"camera",
				"car",
				"carrot",
				"cart",
				"category",
				"chart-area",
				"chart-bar",
				"chart-line",
				"chart-pie",
				"clipboard",
				"clock",
				"cloud-saved",
				"cloud-upload",
				"cloud",
				"code-standards",
				"coffee",
				"color-picker",
				"columns",
				"controls-back",
				"controls-forward",
				"controls-pause",
				"controls-play",
				"controls-repeat",
				"controls-skipback",
				"controls-skipforward",
				"controls-volumeoff",
				"controls-volumeon",
				"cover-image",
				"dashboard",
				"database-add",
				"database-export",
				"database-import",
				"database-remove",
				"database-view",
				"database",
				"desktop",
				"dismiss",
				"download",
				"drumstick",
				"edit-large",
				"edit-page",
				"edit",
				"editor-aligncenter",
				"editor-alignleft",
				"editor-alignright",
				"editor-bold",
				"editor-break",
				"editor-code-duplicate",
				"editor-code",
				"editor-contract",
				"editor-customchar",
				"editor-expand",
				"editor-help",
				"editor-indent",
				"editor-insertmore",
				"editor-italic",
				"editor-justify",
				"editor-kitchensink",
				"editor-ltr",
				"editor-ol-rtl",
				"editor-ol",
				"editor-outdent",
				"editor-paragraph",
				"editor-paste-text",
				"editor-paste-word",
				"editor-quote",
				"editor-removeformatting",
				"editor-rtl",
				"editor-spellcheck",
				"editor-strikethrough",
				"editor-table",
				"editor-textcolor",
				"editor-ul",
				"editor-underline",
				"editor-unlink",
				"editor-video",
				"ellipsis",
				"email-alt",
				"email-alt2",
				"email",
				"embed-audio",
				"embed-generic",
				"embed-photo",
				"embed-post",
				"embed-video",
				"excerpt-view",
				"exit",
				"external",
				"facebook-alt",
				"facebook",
				"feedback",
				"filter",
				"flag",
				"food",
				"format-aside",
				"format-audio",
				"format-chat",
				"format-gallery",
				"format-image",
				"format-quote",
				"format-status",
				"format-video",
				"forms",
				"fullscreen-alt",
				"fullscreen-exit-alt",
				"games",
				"google",
				"googleplus",
				"grid-view",
				"groups",
				"hammer",
				"heading",
				"heart",
				"hidden",
				"hourglass",
				"html",
				"id-alt",
				"id",
				"image-crop",
				"image-filter",
				"image-flip-horizontal",
				"image-flip-vertical",
				"image-rotate-left",
				"image-rotate-right",
				"image-rotate",
				"images-alt",
				"images-alt2",
				"index-card",
				"info-outline",
				"info",
				"insert-after",
				"insert-before",
				"insert",
				"instagram",
				"laptop",
				"layout",
				"leftright",
				"lightbulb",
				"linkedin",
				"list-view",
				"location-alt",
				"location",
				"lock-duplicate",
				"lock",
				"marker",
				"media-archive",
				"media-audio",
				"media-code",
				"media-default",
				"media-document",
				"media-interactive",
				"media-spreadsheet",
				"media-text",
				"media-video",
				"megaphone",
				"menu-alt",
				"menu-alt2",
				"menu-alt3",
				"menu",
				"microphone",
				"migrate",
				"minus",
				"money-alt",
				"money",
				"move",
				"nametag",
				"networking",
				"no-alt",
				"no",
				"open-folder",
				"palmtree",
				"paperclip",
				"pdf",
				"performance",
				"pets",
				"phone",
				"pinterest",
				"playlist-audio",
				"playlist-video",
				"plugins-checked",
				"plus-alt",
				"plus-alt2",
				"plus",
				"podio",
				"portfolio",
				"post-status",
				"pressthis",
				"printer",
				"privacy",
				"products",
				"randomize",
				"reddit",
				"redo",
				"remove",
				"rest-api",
				"rss",
				"saved",
				"schedule",
				"screenoptions",
				"search",
				"share-alt",
				"share-alt2",
				"share",
				"shield-alt",
				"shield",
				"shortcode",
				"slides",
				"smartphone",
				"smiley",
				"sort",
				"sos",
				"spotify",
				"star-empty",
				"star-filled",
				"star-half",
				"sticky",
				"store",
				"superhero-alt",
				"superhero",
				"table-col-after",
				"table-col-before",
				"table-col-delete",
				"table-row-after",
				"table-row-before",
				"table-row-delete",
				"tablet",
				"tag",
				"tagcloud",
				"testimonial",
				"text-page",
				"text",
				"thumbs-down",
				"thumbs-up",
				"tickets-alt",
				"tickets",
				"tide",
				"translation",
				"trash",
				"twitch",
				"twitter-alt",
				"twitter",
				"undo",
				"universal-access-alt",
				"universal-access",
				"unlock",
				"update-alt",
				"update",
				"upload",
				"vault",
				"video-alt",
				"video-alt2",
				"video-alt3",
				"visibility",
				"warning",
				"welcome-add-page",
				"welcome-comments",
				"welcome-learn-more",
				"welcome-view-site",
				"welcome-widgets-menus",
				"welcome-write-blog",
				"whatsapp",
				"wordpress-alt",
				"wordpress",
				"xing",
				"yes-alt",
				"yes",
				"youtube",
			];

			//options[1] = 'dashicons';

		} // font_set

		font_set();

		function build_list($popup,$button,clear) {
			var $list = $popup.find('.icon-picker-list');

			if (clear==1) {
				$list.empty(); // clear list //
			}

			for (var i in icons) {
			  $list.append('<li data-icon="'+icons[i]+'"><a href="#" title="'+icons[i]+'"><span class="'+options[0]+' '+options[1]+'-'+icons[i]+'"></span></a></li>');
			}

			$('a', $list).click(function(e) {
				e.preventDefault();
				var title = $(this).attr("title");
				$target.val(options[0]+"|"+options[1]+"-"+title);
				$button.removeClass().addClass("button icon-picker "+options[0]+" "+options[1]+"-"+title);
				removePopup();
			});
		}
		
		function removePopup(){
			$(".icon-picker-container").remove();
		}
		

		var $button = $('.icon-picker');
		$button.each( function() {
			$(this).on('click.iconPicker', function() {
				createPopup($(this));
			});
		});


		function createPopup($button) {
			var $target = $($button.data('target'));
			var $popup = $('<div class="icon-picker-container"> \
						<div class="icon-picker-control" /> \
							<ul class="icon-picker-list" /> \
						</div>')
						.css({
							'top': $button.offset().top,
							'left': $button.offset().left
						});

			build_list($popup,$button,0);
					
			var $control = $popup.find('.icon-picker-control');
			$control.html('<a data-direction="back" href="#"><span class="dashicons dashicons-arrow-left-alt2"></span></a> '+
					'<input type="text" class="" placeholder="Search" />'+
					'<a data-direction="forward" href="#"><span class="dashicons dashicons-arrow-right-alt2"></span></a>'+
					'');

			$('a', $control).click(function(e) {
				e.preventDefault();
				if ($(this).data('direction') === 'back') {
					//move last 20 elements to front
					$('li:gt(' + (icons.length - 21) + ')', $list).each(function() {
						$(this).prependTo($list);
					});
				} else {
					//move first 20 elements to the end
					$('li:lt(20)', $list).each(function() {
						$(this).appendTo($list);
					});
				}
			});

					
			$popup.appendTo('body').show();

			$('input', $control).on('keyup', function(e) {
				var search = $(this).val();
				if (search === '') {
					//show all again
					$('li:lt(20)', $list).show();
				} else {
					$('li', $list).each(function() {
						if ($(this).data('icon').toString().toLowerCase().indexOf(search.toLowerCase()) !== -1) {
							$(this).show();
						} else {
							$(this).hide();
						}
					});
				}
			});

			$(document).mouseup(function (e){
				if (!$popup.is(e.target) && $popup.has(e.target).length === 0) {
					removePopup();
				}
			});

		}
	}

	$(function() {
		$('.icon-picker').iconPicker();
	});

}(jQuery));
