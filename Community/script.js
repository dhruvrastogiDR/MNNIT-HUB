var contacts = []; // Array to store all contacts

function createContact() {
  // Get form values
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var phone = document.getElementById("phone").value;
  var address = document.getElementById("address").value;

  // Create contact object
  var contact = {
    name: name,
    email: email,
    phone: phone,
    address: address
  };

  // Add contact to array
  contacts.push(contact);

  // Reset form
  document.getElementById("name").value = "";
  document.getElementById("email").value = "";
  document.getElementById("phone").value = "";
  document.getElementById("address").value = "";

  // Show success message
  alert("Contact created successfully!");

  // Redirect back to home page
  window.location.href = "index.html";

  // Call function to display updated contact list
  displayContacts();
}

function displayContacts() {
  var contactList = document.querySelector("#contact-list ul");

  // Clear existing list
  contactList.innerHTML = "";

  // Add each contact to the list
  for (var i = 0; i < contacts.length; i++) {
    var contact = contacts[i];
    var listItem = document.createElement("li");
    var link = document.createElement("a");
    link.href = "contact_options.html";
    link.textContent = contact.name;
    listItem.appendChild(link);
    contactList.appendChild(listItem);
  }
}
