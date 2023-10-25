let search = document.getElementById('search');
search.addEventListener('change', () => {

    let api = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=';
    let input = document.getElementById('search');
    let address = document.getElementById('addr');
    let param = input.value.replace("-", ""); //入力された郵便番号から「-」を削除
    let url = api + param;

    fetchJsonp(url, {
        timeout: 10000, //タイムアウト時間
    })
        .then((response) => {
            error.textContent = ''; //HTML側のエラーメッセージ初期化
            return response.json();
        })
        .then((data) => {
            address.value = data.results[0].address1 + data.results[0].address + data.results[0].address3;

        })
        .catch((ex) => { //例外処理
            console.log(ex);
        });
}, false);