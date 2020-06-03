let activePhotoIndex = false;
const photos = [];
let photoModal = document.getElementById('modal-photo');

// https://developer.wordpress.com/docs/photon/
const sizedImage = (url, width = false, height = false, scale = false) => {
  if (!width && !height && !scale) return url;
  let sizedImageUrl = url.split('?')[0];
  sizedImageUrl += '?';
  if (width) sizedImageUrl += `&w=${width}`;
  if (height) sizedImageUrl += `&h=${height}`;
  if (scale) sizedImageUrl += `&zoom=${scale}`;
  return sizedImageUrl;
};

const srcset = (url, width) => {
  return `${sizedImage(url, width)}, ${sizedImage(url, width, 2)} 2x`;
};

const activatePhoto = photoIndex => {
  const photo = photos[photoIndex];
  const sourceMap = [
    { media: '0px', srcset: srcset(photo, 320) },
    { media: '321px', srcset: srcset(photo, 375) },
    { media: '376px', srcset: srcset(photo, 420) },
    { media: '421px', srcset: srcset(photo, 480) },
    { media: '481px', srcset: srcset(photo, 640) },
    { media: '641px', srcset: srcset(photo, 768) },
    { media: '769px', srcset: srcset(photo, 992) },
    { media: '993px', srcset: srcset(photo, 1200) },
  ];

  const sourceElements = sourceMap.map(source => {
    return `<source media="${source.media}" srcset="${source.srcset} />`;
  });

  photoModal.classList.add('is-loading');
  const image = new Image();
  image.onload = () => {
    photoModal.innerHTML = sourceElements.join('');
    photoModal.innerHTML += `<img src="${sizedImage(photo, 1200)}" srcset="${sizedImage(photo, 1200, false, 2)}" alt="Zoomed Image">`;
    setTimeout(() => {
      photoModal.classList.remove('is-loading');
    }, 250);
  };
  image.src = photo;

  activePhotoIndex = photoIndex;
};

const bind = () => {
  document.querySelectorAll('[data-photo][data-modal-open]').forEach((photoElement, index) => {
    const { photo = false } = photoElement.dataset;
    if (!photo) return;
    photos.push(photo);
    photoElement.addEventListener('click', () => activatePhoto(index));
  });

  document.querySelectorAll('[data-photo-viewer-nav]').forEach(navElement => {
    navElement.addEventListener('click', event => {
      const dir = parseInt(navElement.dataset.navDir);
      activatePhoto(activePhotoIndex + dir);
    });
  });
};

export default {
  bind,
};
