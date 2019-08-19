/*
 * Simple Modal Scripts
 *
 * Author: Vanessa Coles
 * Description: A very simple modal for use in personal projects.
 --------------------------------------------------------- */

'use_strict';

// Setup initial variables.
var win = $(window);
	body = $('body');
	modalElem = $('[data-modal=""]'),
	modalOverlay = $('<div class="modal-overlay"></div>');
	openModalBtn = $('[data-modal="open-modal"]'),
	closeModalBtn = $('[data-modal="close-modal"]'),

	// Clone overlay for reuse after its removed from the DOM.
	modalOverlayClone = modalOverlay.clone();

// Setup the methods for the modal.
var modal = {
	// Hide the modal window.
	hideModal: function () {
		modalElem.hide();
		modalElem.attr('data-modal', 'hidden');
	},

	// Show the modal window.
	showModal: function () {
		modalElem.show();
		modalElem.attr('data-modal', 'active');
	},

	// Open the modal window.
	openModal: function (duration) {
		if (modalElem && modalElem.attr('data-modal') === 'hidden') {
			// Add the overlay element to the DOM.
			body.prepend(modalOverlay);

			// Add attribute to indicate "active" state.
			modalElem.attr('data-modal', 'active').css('visibility', 'visible');

			// Fade in the overlay and the modal.
			modalOverlay.fadeIn(duration);
			modalElem.fadeIn(duration);
		} else {
			return;
		}
	},

	// Close the modal window.
	closeModal: function (duration) {
		if (modalElem && modalElem.attr('data-modal') === 'active') {
			// Add attribute to indicate "active" state.
			modalElem.attr('data-modal', 'hidden').css('visibility', 'hidden');

			// Fade out the modal.
			modalElem.fadeOut(duration);
			modalOverlay.fadeOut(duration, function () {
				// Remove the overlay.
				body.on('click', modalOverlay, function () {
					modalOverlayClone.detach();
				});
			});
		} else {
			return;
		}
	},

	// Close the modal window with the escape key.
	escModal: function () {
		$(document).keyup(function (event) {
			if (event.keyCode == 27) {
				if (modalElem && modalElem.attr('data-modal') === 'active') {
					modal.closeModal();
				} else {
					return;
				}
			}
		});
	}
}

// Hide the modal by default.
modal.hideModal();

// Open the modal with the open button.
openModalBtn.click(function () {
	modal.openModal(600);
});

// Close the modal with the close button.
closeModalBtn.click(function () {
	modal.closeModal(600);
});

// Close the modal when the overlay is clicked.
modalOverlay.click(function () {
	modal.closeModal(600);
});

// Close the modal with the ESC key.
modal.escModal();

// Get the modal width and height.
var modalWidth = modalElem.width();
var	modalHeight = modalElem.height();

// If the modal height is greater than the height
// of the window, set its position to absolute.
if (win.height() < modalHeight) {
	modalElem.css('position', 'absolute');
}

// When the window is resized, if the window height is less
// than the modal height, check for position: absolute.
// If not, set its position to absolute.
win.resize(function () {
	if ($(this).height() < modalHeight) {
		if (modalElem.css('position') !== 'asbolute') {
			modalElem.css('position', 'absolute');
		}
	} else {
		if (modalElem.css('position') == 'absolute') {
			modalElem.css('position', 'fixed');
		}
	}
});




