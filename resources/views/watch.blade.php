<!DOCTYPE html>
<html>
<head>
    <title>テキスト結果</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
    <div class="flex w-full">
        <div class="w-1/3">
            <div class="justify-center">
                <div class="m-2">
                    <h1>AIが抽出した内容を確認の上、入力欄に付加情報を加えてください。</h1>
                    <p>足りない分析条件を保管する。</p>
                    <p>キーワードには化学式、分子量や官能基、中間体番号など</p>
                    <p>AIが情報を探すのに有益な情報を加えます。</p>
                    <p>構造式がわかっている場合は<span class="text-rose-500">"SMILEScode:"</span>も入力します。</p>

                </div>
                <br>
                <div class="mx-2">

                    <div class="border-2 border-blue-400">
                        <h1>具体例1: A2470</h1>
                        <img class="w-3/5" src="{{ asset('img/A2470.png') }}" alt="">
                        <p>キーワード:(S)-3-Amino-2-(tert-butoxycarbonylamino)propionic Acid</p>
                        <p>C8H16N2O4:204.23。アミノ酸ビルディングブロック、官能基は-NH2とCOOH。</p>    
                        <p>SMILEScode: CC(C)(C)OC(=O)NC(CN)C(=O)O</p>    
                    </div>
                    <br>
                    <div class="border-2 border-blue-400">
                        <h1>具体例2: 合成中間体A</h1>
                        <img class="w-3/5" src="{{ asset('img/B5588.png') }}" alt="">
                        <p>キーワード:C17H26BNO4=319.21。芳香族ボロン酸エステル, Boc保護有り.</p>
                        <p>特注品Z5xy4の合成中間体3</p>
                        <p>SMILEScode: CC(C)(C)OC(=O)Nc2ccc(B1OC(C)(C)C(C)(C)O1)cc2</p>
                    </div>

                </div>
    
            </div>
        </div>
        <div class="w-1/3">
            <h1 class="text-sky-800 ml-2 my-2">PDFから抽出されたテキスト</h1>
            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <textarea class="border-2 border-black w-4/5" name="text_data" id="" cols="" rows="30">{{ $textData }}</textarea>
                <input type="hidden" name='file_path' value={{ $filePath }}>
                <button class="border border-black rounded-md bg-indigo-500 p-2 ml-2" type="submit">dataをUpload</button>
            </form>
            
        </div>

        <div class="w-1/3">
            {{-- pngの表示 --}}
            <div  class="zoom-container border-4 border-black mr-2">
                <img src="data:image/png;base64,{{ $imageData }}" alt="Uploaded Image" class="zoom-image"  id="zoom-image">
            </div>
        </div>
    </div>
    

    <a href="{{ route('request') }}" class="ml-2 rounded-md text-rose-500 p-2">別のPDFをアップロード</a>


    <style>
        .zoom-container {
            width: 100%;
            height: 800px; /* 表示エリアの高さを指定 */
            overflow-y: auto; /* 縦方向のスクロールを有効に */
            overflow-x: auto; /* 横方向のスクロールを有効に */
            position: relative;
            border: 1px solid #ccc; /* 画像の周りに枠を追加 */
            cursor: zoom-in;
        }

        .zoom-image {
            width: 100%;
            height: 100%;
            object-fit: contain; /* 画像をコンテナ内に収める */
            transition: transform 0.3s ease; /* 拡大縮小のスムーズなトランジション */

            
        }

        /* 拡大時の状態 */
        .zoomed {
            cursor: zoom-out; /* 拡大時のカーソル */
            height: auto;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const image = document.getElementById('zoom-image');
            let isZoomed = false; // 現在のズーム状態を追跡

            image.addEventListener('click', function (event) {
                if (!isZoomed) {
                    const rect = image.getBoundingClientRect();
                    const offsetX = event.clientX - rect.left;
                    const offsetY = event.clientY - rect.top;

                    const scale = 2;
                    const originX = (offsetX / rect.width) * 100;
                    const originY = (offsetY / rect.height) * 100;

                    image.style.transformOrigin = `${originX}% ${originY}%`;
                    image.style.transform = `scale(${scale})`;
                    image.classList.add('zoomed');
                    isZoomed = true;
                } else {
                    image.style.transform = `scale(1)`;
                    image.classList.remove('zoomed');
                    isZoomed = false;
                }
            });
        });
    </script>

    
</body>
</html>
