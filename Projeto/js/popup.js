$(document).ready(setUp);
function setUp() {
	$('#sign_in').click(function () {
		showModal($('#popup'));
	});

	$('#sign_up').click(function () {
		showModal($('#popup-register'));
	});

	$('#search_ev').click(function () {
		showModal($('#popup-create-event'));
	});

	$('.btn-view-more').click(populateModal);

	$('.close-thik').click(hideModal);

	$('#edit-btn').click(showEdit);

	$('#del-btn').click(showConfirm);

	$('#invite-btn').click(showInvite);

}


function showModal(modal) {
	modal.parent().show();
	modal.fadeIn(500);
	
	$('.cover').fadeTo(500, 0.5);
}

function hideModal() {
	$('.popup').fadeOut(500);
	$('.cover').fadeTo(500, 1);
	$('.popup-container').hide();
}

function showConfirm() {
	modal = $('#del-confirm');
	var ev = $(this).siblings('input:hidden').val();
	modal.children().children('input:hidden').val(ev);
	hideModal();
	showModal(modal);
}

function showEdit() {
	modal = $('#popup-edit-event');
	var ev = $(this).prev('input:hidden').val()
	modal.children().children().first().val(ev);
	hideModal();
	showModal(modal);
}

function showInvite() {
	modal = $('#popup-invite-people');
	var ev = $(this).prev('input:hidden').val()
	modal.children().children().first().val(ev);
	hideModal();
	showModal(modal);
}

function populateModal() {
	modal = $('.modal-view-more');
	var ev = $(this).next('input:hidden').val();
	$('.event-comments').children('span').empty();
	$.getJSON('selected-event.php', {eid: ev}, function(data) {
		modal.children('h2').text(data['title'] + ' (' + data['state'] + ' event)');
		modal.children('.event-type').children().text(data['type']);
		modal.children('.event-state').children().text(data['state']);
		modal.children('#event-image').children().attr('src', 'img/' + data['eid'] + '.jpg');
		modal.children('#event-description').children().text(data['description']);
		modal.children('.event-date').children().first().text('From ' + data['s_date'] + ' at ' + data['s_time']);
		modal.children('.event-date').children().last().text('To ' + data['e_date'] + ' at ' + data['e_time']);
		modal.children('#event-location').children().text(data['location']);
		modal.children('.event-action').children().filter('input').val(ev);
		modal.children().children('.comment').children().filter('input:hidden').val(ev);

		loadComments(ev);
	});

	var user = null;
	$.getJSON('get-session.php', function(data) {
		user = data;
		if(user != null) {
			$.getJSON('check-owned.php', {uid: user, eid: ev}, function(data) {
				if (data != false) {
					$('#join-btn').hide();
					$('#leave-btn').hide();
					$('#edit-btn').show();
					$('#invite-btn').show();
				} else {
					$('#edit-btn').hide();
					$('#invite-btn').hide();
					$.getJSON('check-joined.php', {uid: user, eid: ev}, function(data) {
						if (data != false) {
							$('#join-btn').hide();
						  $('#invite-btn').hide();
							$('#leave-btn').show();
						} else {
							$('#leave-btn').hide();
							$('#invite-btn').hide();
							$('#join-btn').show();
						}
					});
				}
			});

			$.getJSON('check-invite.php', {uid: user, eid: ev}, function(data) {
				if (data['answered'] == 0) {
					$('#decline-btn').show();
				} else {
					$('#decline-btn').hide();
				}
			});
		}
	});

	$.getJSON('')

	showModal($('.modal-view-more'));
}

function loadComments(ev) {
	$.getJSON('get-comments.php', {eid: ev}, function(data) {
		var comments_div = $('.event-comments').children('span');
		$.each(data, function(key, value) {
			comments_div.append($(document.createElement('p')).addClass('username').text(data[key]['user']));
			comments_div.append($(document.createElement('p')).addClass('comment').text(data[key]['comment']));
		});
	});
}
