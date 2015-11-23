/**
 * @author th
 */

/** @param {jQuery} $ jQuery Object */
!function($, window, document, _undefined)
{
	XenForo.BlockedBbCodeTooltip = function($title)
	{
		var description = $title.data('description');

		if (description && $(description).length)
		{
			$(description)
				.addClass('xenTooltip blockedBbCodeTip')
				.appendTo('body');

			$title.tooltip(XenForo.configureTooltipRtl(
			{
				effect: 'slide',
				slideOffset: 30,
				offset: [ 30, 10 ],
				slideInSpeed: XenForo.speed.xfast,
				slideOutSpeed: 50 * XenForo._animationSpeedMultiplier,

				/*effect: 'fade',
				fadeInSpeed: XenForo.speed.xfast,
				fadeOutSpeed: XenForo.speed.xfast,*/

				predelay: 250,
				position: 'bottom right',
				tip: description
			}));
			$title.click(function() { $(this).data('tooltip').hide(); });
		}
	};

    XenForo.register('a.blocked', 'XenForo.BlockedBbCodeTooltip');
}
(jQuery, this, document);