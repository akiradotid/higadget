function bukaLaporanKeuanganBulanan(open_url) {
    var target_url = base_url + open_url + '?bulan=' + $('#bulan').val() + '&tahun=' + $('#tahun').val();
    popupCenter({
        url: target_url,
        title: 'targetWindow',
        w: 1200,
        h: 800
    });
}

function bukaLaporanKeuanganTahunan(open_url) {
    var target_url = base_url + open_url + '?tahun=' + $('#tahun').val();
    popupCenter({
        url: target_url,
        title: 'targetWindow',
        w: 1200,
        h: 800
    });
}

const popupCenter = ({
    url,
    title,
    w,
    h
}) => {
    // Fixes dual-screen position                             Most browsers      Firefox
    const dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : window.screenX;
    const dualScreenTop = window.screenTop !== undefined ? window.screenTop : window.screenY;

    const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    const systemZoom = width / window.screen.availWidth;
    const left = (width - w) / 2 / systemZoom + dualScreenLeft
    const top = (height - h) / 2 / systemZoom + dualScreenTop
    const newWindow = window.open(url, title,
        `
    toolbar=no,
    location=no,
    status=no,
    menubar=no,
    scrollbars=yes,
    resizable=yes
    width=${w / systemZoom}, 
    height=${h / systemZoom}, 
    top=${top}, 
    left=${left}
    `
    )

    if (window.focus) newWindow.focus();
}