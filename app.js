window.addEventListener('load', loader);

function loader() {
  const TLLOAD = gsap.timeline();

  TLLOAD
    .to('.image-contener', { height: 400, duration: 1.3, delay: 0.4, ease: 'power2.out' })
    .to('.block-txt', { height: 'auto', duration: 0.6, delay: 0, ease: 'power2.out' }, '-=0.8')
    //.to('.block-txth 2',{y=0, ease:'power2.out' },'-=0.6')
    .to('.load-container', { opacity: 0, duration: 0.8, delay: 0.7 })
    .add(() => {
      document.querySelector('.load-container').style.display = 'none';
    });
}
