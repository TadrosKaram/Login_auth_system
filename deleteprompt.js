const delbtn = document.querySelector(".del-btn");
delbtn.addEventListener("click", function () {
  const userID = Number(prompt("Enter the id number you like to delete"));

  if (Number.isInteger(userID)) {
    document.querySelector("#delinput").value = userID;
    document.querySelector("#promptForm").submit();
  } else {
    alert("Invalid input. Reloading...");
    location.reload();
  }
});
