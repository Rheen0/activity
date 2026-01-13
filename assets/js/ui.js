(function(){
  document.addEventListener('DOMContentLoaded', function(){
    // Attendee Edit Modal: populate fields
    var editAttModal = document.getElementById('editAttendeeModal');
    if (editAttModal) {
      editAttModal.addEventListener('show.bs.modal', function(event){
        var btn = event.relatedTarget;
        if (!btn) return;
        var id = btn.getAttribute('data-id') || '';
        var name = btn.getAttribute('data-name') || '';
        var email = btn.getAttribute('data-email') || '';
        var ticket = btn.getAttribute('data-ticket') || '';
        var idInput = document.getElementById('edit-attendee-id');
        var nameInput = document.getElementById('edit-attendee-name');
        var emailInput = document.getElementById('edit-attendee-email');
        var ticketSelect = document.getElementById('edit-attendee-ticket');
        if (idInput) idInput.value = id;
        if (nameInput) nameInput.value = name;
        if (emailInput) emailInput.value = email;
        if (ticketSelect) ticketSelect.value = ticket;
      });

      var updateBtn = editAttModal.querySelector('.modal-footer .btn-success');
      if (updateBtn) {
        updateBtn.addEventListener('click', function(){
          var id = document.getElementById('edit-attendee-id').value;
          var name = document.getElementById('edit-attendee-name').value;
          var email = document.getElementById('edit-attendee-email').value;
          var ticket = document.getElementById('edit-attendee-ticket').value;
          var btn = document.querySelector('button[data-id="'+id+'"]');
          if (!btn) return;
          var row = btn.closest('tr');
          if (!row) return;
          var tds = row.querySelectorAll('td');
          if (tds.length >= 3) {
            tds[0].textContent = name;
            tds[1].textContent = email;
            tds[2].textContent = ticket;
          }
        });
      }
    }

    // Attendee Delete Modal
    var delAttModal = document.getElementById('deleteAttendeeModal');
    if (delAttModal) {
      delAttModal.addEventListener('show.bs.modal', function(event){
        var btn = event.relatedTarget;
        if (!btn) return;
        var id = btn.getAttribute('data-id') || '';
        var hidden = document.getElementById('delete-attendee-id');
        if (hidden) hidden.value = id;
      });
      var delBtn = delAttModal.querySelector('.modal-footer .btn-danger');
      if (delBtn) {
        delBtn.addEventListener('click', function(){
          var id = document.getElementById('delete-attendee-id').value;
          var btn = document.querySelector('button[data-id="'+id+'"]');
          if (!btn) return;
          var row = btn.closest('tr');
          if (row) row.remove();
        });
      }
    }

    // Booth Edit Modal
    var editBoothModal = document.getElementById('editBoothModal');
    if (editBoothModal) {
      editBoothModal.addEventListener('show.bs.modal', function(event){
        var btn = event.relatedTarget;
        if (!btn) return;
        document.getElementById('edit-id').value = btn.getAttribute('data-id') || '';
        document.getElementById('edit-old-image').value = btn.getAttribute('data-image') || '';
        document.getElementById('edit-name').value = btn.getAttribute('data-name') || '';
        document.getElementById('edit-location').value = btn.getAttribute('data-location') || '';
        document.getElementById('edit-description').value = btn.getAttribute('data-description') || '';
      });
      var updateBoothBtn = editBoothModal.querySelector('.modal-footer .btn-success');
      if (updateBoothBtn) {
        updateBoothBtn.addEventListener('click', function(){
          var id = document.getElementById('edit-id').value;
          var name = document.getElementById('edit-name').value;
          var location = document.getElementById('edit-location').value;
          var description = document.getElementById('edit-description').value;
          var btn = document.querySelector('button[data-id="'+id+'"]');
          if (!btn) return;
          var card = btn.closest('.card');
          if (!card) return;
          var headerTitle = card.querySelector('.card-header h5');
          var smallLoc = card.querySelector('.card-body small');
          var para = card.querySelector('.card-text');
          if (headerTitle) headerTitle.textContent = name;
          if (smallLoc) smallLoc.textContent = 'Location: ' + location;
          if (para) para.textContent = description;
        });
      }
    }

    // Booth Delete Modal
    var delBoothModal = document.getElementById('deleteBoothModal');
    if (delBoothModal) {
      delBoothModal.addEventListener('show.bs.modal', function(event){
        var btn = event.relatedTarget;
        if (!btn) return;
        delBoothModal._id = btn.getAttribute('data-id') || '';
      });
      var delBoothBtn = delBoothModal.querySelector('.modal-footer .btn-danger');
      if (delBoothBtn) {
        delBoothBtn.addEventListener('click', function(){
          var id = delBoothModal._id;
          var btn = document.querySelector('button[data-id="'+id+'"]');
          if (!btn) return;
          var col = btn.closest('.col-lg-4') || btn.closest('.col');
          if (col) col.remove();
        });
      }
    }
  });
})();
