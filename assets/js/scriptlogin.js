const container = document.getElementById("container");
const registerbtn = document.getElementById("register");
const loginbtn = document.getElementById("login");

registerbtn.addEventListener("click", () => {
  container.classList.add("active");
});

loginbtn.addEventListener("click", () => {
  container.classList.remove("active");
});

// Data pengguna hardcoded untuk simulasi
const users = [
  { username: "admin", password: "admin123", role: "admin" },
  { username: "user", password: "user123", role: "user" }
];

document.getElementById("loginForm").addEventListener("submit", function (event) {
  event.preventDefault(); // Mencegah form submit default

  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;
  // const messageDiv = document.getElementById("message");

  // Periksa kredensial
  const user = users.find(u => u.username === username && u.password === password);

  if (user) {
      if (user.role === "admin") {
          messageDiv.textContent = "Selamat datang, Admin!";
          // Redirect atau panggil fungsi khusus admin di sini
      } else if (user.role === "user") {
          messageDiv.textContent = "Selamat datang, User!";
          // Redirect atau panggil fungsi khusus user di sini
      }
  } else {
      messageDiv.textContent = "Username atau password salah!";
      messageDiv.style.color = "red";
  }
});
