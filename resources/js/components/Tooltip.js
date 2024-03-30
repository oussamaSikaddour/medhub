


const showToolTip = (toolTip, parent) => {
    toolTip.classList.add("show");
    parent.setAttribute("aria-expanded", true);
    toolTip.setAttribute("aria-hidden", false);
  };
 const hideToolTip = (toolTip, parent) => {
    toolTip.classList.remove("show");
    parent.setAttribute("aria-expanded", false);
    toolTip.setAttribute("aria-hidden", true);
  };
const Tooltip = ()=>{

const buttonsWithTooltip = document.querySelectorAll(".hasToolTip");

buttonsWithTooltip.forEach(button => {
  const toolTip = button.querySelector(".toolTip");
  if (toolTip) {
    button.addEventListener('mouseover', () => {
      showToolTip(toolTip, button);
    });
    button.addEventListener('mouseout', () => {
      hideToolTip(toolTip, button);
    });
  }
});

}



export default Tooltip;