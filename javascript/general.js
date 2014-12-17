 function confirmarEliminar (email) {

   alertify.set({ labels: {
    ok     : "Si",
    cancel : "No"
  } });

                                alertify.set({ buttonFocus: "none" }); // "none", "ok", "cancel"

                                alertify.confirm("Seguro que quieres eliminar a un usuario de tu lista?", function (e) {
                                  if (e) {
                                    document.location.href = "controladoras/eliminaramigo.php?email=" + email;
                                  } else {

                                    return false;
                                  }
                                });

                              }