window.addEventListener("DOMContentLoaded", () => {
  /*
    Function to truncate text and add a "more" link
  */
  var showChar = 400;
  var ellipsestext = "...";
  var moretext = "(more)";
  var lesstext = "(less)";

  // Only apply to paragraphs in the research section
  const cardTextsAll = document.body.querySelectorAll("#research p:last-child");
  for (const cardText of cardTextsAll) {
    var content = cardText.innerHTML;

    // Check that content is long enough to truncate (greater than showChar)
    if (content.length > showChar) {
      cardText.classList.add("with-hidden");

      var c = content.substring(0, showChar);
      var h = content.substring(showChar, content.length);

      var html = `${c}<span class="moreellipses" aria-hidden="true">${ellipsestext}</span><span class="morecontent">${h}</span>  <a href="" class="morelink">${moretext}</a>`;

      cardText.innerHTML = html;
    }
  }

  const moreLinksAll = document.getElementsByClassName("morelink");
  for (const moreLink of moreLinksAll) {
    moreLink.addEventListener("click", (event) => {
      // don't act like a link
      event.preventDefault();
      const thisLink = event.currentTarget;
      if (thisLink.classList.contains("less")) {
        thisLink.classList.remove("less");
        thisLink.parentElement.classList.add("with-hidden");
        thisLink.innerText = moretext;
      } else {
        thisLink.classList.add("less");
        thisLink.parentElement.classList.remove("with-hidden");
        thisLink.innerText = lesstext;
      }
    });
  }
});
