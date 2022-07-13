let logout = document.getElementById("logout-btn");

logout.addEventListener("click", () => {
  sessionStorage.clear();
});
