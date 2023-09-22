function myFunction(imgs) {
    // je cible la balise img qui affiche en grand:
  const AFFICHEIMG = document.querySelector(".photoBiographie");
//   je lui dis de remplacer son src par celui des imgs, qui est dans mon html, celui de onclick="myFunction(this);", qui est en fait le src de chaque image mini:
  AFFICHEIMG.src = imgs.src;
}

