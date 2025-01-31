document.getElementById("contactForm").addEventListener("submit", async (event) => {
    event.preventDefault();
  
    try {
      const response = await fetch('/send_email.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          name: document.getElementById('name').value,
          email: document.getElementById('email').value,
          message: document.getElementById('message').value
        })
      });
  
      const data = await response.json();
  
      if (data.success) {
        alert('Message sent successfully!');
      } else {
        alert(data.error);
      }
    } catch (error) {
      console.error('Error:', error);
      alert('An error occurred. Please try again later.');
    }
  });