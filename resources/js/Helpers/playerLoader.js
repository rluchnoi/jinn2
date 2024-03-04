export default new Promise((res) => {
  const url = window.location.origin + '/playerjs.js';

  const script = document.createElement('script');
  script.onload = () => res();
  script.setAttribute(
    'src',
    url
  );

  document.head.appendChild(script);
});
