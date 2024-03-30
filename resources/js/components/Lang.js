import {handleKeyEvents} from "../traits/KeyEventHandlers";
import despatchCustomEvent from "../traits/DespatchCustomEvent";






const setLanguagePreference =(language) => {
localStorage.setItem('language', language);
document.documentElement.classList.toggle('arabic', language === 'Ar');
}


const toggleMenu = (langBtn, langMenu) => {
  const isOpen = langMenu.classList.toggle("open");
  langBtn.setAttribute("aria-expanded", isOpen);
  langMenu.setAttribute("aria-hidden", !isOpen);
  };


const getIndexByLang = (languageCode, initialLanguages) =>
 initialLanguages.findIndex((language) => language.lang === languageCode);

const populateLangMenu = (langBtn,langMenu,initialLanguages, selectedLang ) => {

const index = getIndexByLang(selectedLang, initialLanguages);
langBtn.innerHTML = `
  <div class="lang">
    <p>${initialLanguages[index].lang}</p>
    <img src="${initialLanguages[index].flag}" alt="${initialLanguages[index].lang} language" />
  </div>
`;


const remainingLanguages = initialLanguages.filter((language) => language.lang !== selectedLang);
langMenu.innerHTML = remainingLanguages.map(  (language) => `
  <li role="menuitem" class="lang__menu__item" tabindex="0">
    <div class="lang">
      <p>${language.lang}</p>
      <img src="${language.flag}" alt="${language.lang} language" />
    </div>
  </li>
`).join("");
setLanguagePreference(selectedLang);
};

const handleLangBtnClick = (langBtn,langMenu) => {
toggleMenu(langBtn,langMenu);
const langMenuItems = Array.from(langMenu.querySelectorAll('.lang__menu__item'));
langMenuItems[1]?.focus();
};

const selectLang = (index,langBtn,langMenu,initialLanguages) => {
const langMenuItems = Array.from(langMenu.querySelectorAll('.lang__menu__item'));
const selectedLang = langMenuItems[index]?.querySelector("p").textContent;
populateLangMenu(langBtn,langMenu,initialLanguages, selectedLang);
toggleMenu(langBtn,langMenu);
langBtn.focus();
despatchCustomEvent('set-locale',{lang:selectedLang});
};


const manageLangMenuOnClickOrKeyDownEvents = (event,langBtn,langMenu,initialLanguages)=>{


  const langMenuItem = event.target.closest('.lang__menu__item');
  if (!langMenuItem) return;
  const langMenuItems = Array.from(document.querySelectorAll('.lang__menu__item'));
  const index = langMenuItems.indexOf(langMenuItem);

  if(event.type==="keydown"){
  handleKeyEvents(event, index,()=> selectLang(index,langBtn,langMenu,initialLanguages), langMenuItems)
    return;
  }
  if(event.type==="click"){
   selectLang(index,langBtn,langMenu ,initialLanguages)
    return ;
  }

  return;

}



const Lang =()=>{


  const initialLanguages = [
    { lang: 'Fr', flag: './img/fr.png' },
    { lang: 'Ar', flag: './img/ar.png' },
  ];
  const savedLanguage = localStorage.getItem('language') || 'Fr';
  const langMenuContainer = document.querySelector(".lang__menu__container");
  const langMenu = document.querySelector(".lang__menu");
  const langBtn = document.querySelector(".lang__btn");

  langMenuContainer?.addEventListener('keydown', (event) => {
    manageLangMenuOnClickOrKeyDownEvents( event, langBtn,langMenu,initialLanguages)
  ;
  });

  langMenuContainer?.addEventListener('click', (event) => {
    manageLangMenuOnClickOrKeyDownEvents(event, langBtn,langMenu,initialLanguages)

  });
  if(langBtn){
    populateLangMenu(langBtn, langMenu, initialLanguages,savedLanguage);
    langBtn?.addEventListener('click', ()=>handleLangBtnClick(langBtn,langMenu));
    setLanguagePreference(savedLanguage);
  }
}


export default Lang
