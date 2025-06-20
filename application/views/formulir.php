<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>
        Dapodik Form
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&amp;family=Roboto&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .font-fredoka {
            font-family: 'Fredoka One', cursive;
        }
    </style>
</head>

<body class="bg-white p-4">
    <div class="max-w-[720px] mx-auto border border-gray-300 p-4 relative select-none">
        <div class="flex flex-wrap items-center gap-2 mb-2">
            <img alt="Dapodik logo with orange, green and blue shapes" class="w-[60px] h-[60px] object-contain" height="60" src="https://storage.googleapis.com/a1aa/image/b32c3721-5c21-4b13-81da-c52f3c2fc3da.jpg" width="60" />
            <h1 class="text-[40px] font-fredoka text-[#3a3a7a] leading-none">
                dapodik
            </h1>
            <div class="flex items-center gap-1 ml-auto">
                <span class="text-[30px] font-fredoka text-[#a3a32a]">
                    202
                </span>
                <span class="text-[30px] font-fredoka text-[#f3a52e]">
                    5
                </span>
                <span class="text-[30px] font-fredoka text-[#f15a29]">
                    /
                </span>
                <span class="text-[30px] font-fredoka text-[#f15a29]">
                    202
                </span>
                <span class="text-[30px] font-fredoka text-[#fbbf3a]">
                    6
                </span>
            </div>
        </div>
        <div class="text-[16px] font-bold text-[#d22a2a] mb-1 ml-[70px] -mt-1">
            Data Pokok Pendidikan
        </div>
        <div class="flex justify-center mb-1">
            <div class="bg-[#6a8a3a] text-white text-[14px] font-semibold rounded px-3 py-[2px] tracking-widest w-[180px] text-center">
                T K AN - N A J A H
            </div>
        </div>
        <div class="flex justify-center mb-2">
            <div class="bg-[#d9d94a] text-[14px] font-semibold rounded px-3 py-[2px] tracking-wide w-[360px] text-center">
                FORMULIR PESERTA DIDIK BARU / PINDAHAN
            </div>
        </div>
        <div class="flex items-center gap-2 mb-2 text-[12px]">
            <span>
                Tanggal Pendaftaran :
            </span>
            <div class="flex gap-1">
                <?php
                $dayNames = [
                    'Sunday' => 'Minggu',
                    'Monday' => 'Senin',
                    'Tuesday' => 'Selasa',
                    'Wednesday' => 'Rabu',
                    'Thursday' => 'Kamis',
                    'Friday' => 'Jumat',
                    'Saturday' => 'Sabtu'
                ];
                $day = $dayNames[date('l')];
                $date = date('d/m/Y');
                echo $day . ', ' . $date;
                ?>
            </div>
        </div>
        <div class="bg-[#6a3a8a] text-white text-[14px] font-semibold rounded px-2 py-1 mb-2">
            Data Pribadi Peserta Didik (Di isi Berdasarkan KK / Akte Kelahiran)
        </div>
        <form class="text-[12px] space-y-1" method="POST" action="<?= base_url('admin/action_create_formulir_siswa') ?>">
            <?php foreach ($pesertadidik as $data): ?>
                <div class="flex">
                    <label class="w-[180px]">
                        <?= htmlspecialchars($data->isi_pertanyaan, ENT_QUOTES, 'UTF-8') ?>
                    </label>
                    <span>:</span>
                    <input
                        aria-label="<?= htmlspecialchars($data->isi_pertanyaan, ENT_QUOTES, 'UTF-8') ?>"
                        class="ml-2 border-b border-black flex-grow outline-none"
                        type="<?= htmlspecialchars($data->jenis_jawaban_pertanyaan, ENT_QUOTES, 'UTF-8') ?>"
                        name="<?= htmlspecialchars($data->id_pertanyaan, ENT_QUOTES, 'UTF-8') ?>"
                        value="<?= isset($data->nilai_tersimpan) ? htmlspecialchars($data->nilai_tersimpan, ENT_QUOTES, 'UTF-8') : '' ?>"
                        required />
                </div>
            <?php endforeach; ?>
            <div class="bg-[#6a3a8a] text-white text-[14px] font-semibold rounded px-2 py-1 mt-6 mb-2">
                Data Ayah Kandung
            </div>
            <?php foreach ($ayahpeserta as $data): ?>
                <div class="flex">
                    <label class="w-[180px]">
                        <?= htmlspecialchars($data->isi_pertanyaan, ENT_QUOTES, 'UTF-8') ?>
                    </label>
                    <span>:</span>
                    <input
                        aria-label="<?= htmlspecialchars($data->isi_pertanyaan, ENT_QUOTES, 'UTF-8') ?>"
                        class="ml-2 border-b border-black flex-grow outline-none"
                        type="<?= htmlspecialchars($data->jenis_jawaban_pertanyaan, ENT_QUOTES, 'UTF-8') ?>"
                        name="<?= htmlspecialchars($data->id_pertanyaan, ENT_QUOTES, 'UTF-8') ?>"
                        value="<?= isset($data->nilai_tersimpan) ? htmlspecialchars($data->nilai_tersimpan, ENT_QUOTES, 'UTF-8') : '' ?>"
                        required />
                </div>
            <?php endforeach; ?>
            <div class="bg-[#6a3a8a] text-white text-[14px] font-semibold rounded px-2 py-1 mt-6 mb-2">
                Data Ibu Kandung
            </div>
            <?php foreach ($ibupeserta as $data): ?>
                <div class="flex">
                    <label class="w-[180px]">
                        <?= htmlspecialchars($data->isi_pertanyaan, ENT_QUOTES, 'UTF-8') ?>
                    </label>
                    <span>:</span>
                    <input
                        aria-label="<?= htmlspecialchars($data->isi_pertanyaan, ENT_QUOTES, 'UTF-8') ?>"
                        class="ml-2 border-b border-black flex-grow outline-none"
                        type="<?= htmlspecialchars($data->jenis_jawaban_pertanyaan, ENT_QUOTES, 'UTF-8') ?>"
                        name="<?= htmlspecialchars($data->id_pertanyaan, ENT_QUOTES, 'UTF-8') ?>"
                        value="<?= isset($data->nilai_tersimpan) ? htmlspecialchars($data->nilai_tersimpan, ENT_QUOTES, 'UTF-8') : '' ?>"
                        required />
                </div>
            <?php endforeach; ?>
            <div class="bg-[#6a3a8a] text-white text-[14px] font-semibold rounded px-2 py-1 mt-6 mb-2">
                Data Wali ( Di Isi Jika Tinggal Dengan Wali )
            </div>
            <?php foreach ($walipeserta as $data): ?>
                <div class="flex">
                    <label class="w-[180px]">
                        <?= htmlspecialchars($data->isi_pertanyaan, ENT_QUOTES, 'UTF-8') ?>
                    </label>
                    <span>:</span>
                    <input
                        aria-label="<?= htmlspecialchars($data->isi_pertanyaan, ENT_QUOTES, 'UTF-8') ?>"
                        class="ml-2 border-b border-black flex-grow outline-none"
                        type="<?= htmlspecialchars($data->jenis_jawaban_pertanyaan, ENT_QUOTES, 'UTF-8') ?>"
                        name="<?= htmlspecialchars($data->id_pertanyaan, ENT_QUOTES, 'UTF-8') ?>"
                        value="<?= isset($data->nilai_tersimpan) ? htmlspecialchars($data->nilai_tersimpan, ENT_QUOTES, 'UTF-8') : '' ?>"
                        required />
                </div>
            <?php endforeach; ?>
            <div class="bg-[#6a3a8a] text-white text-[14px] font-semibold rounded px-2 py-1 mt-6 mb-2">
                Data Periodik Peserta Didik
            </div>
            <?php foreach ($periodikpeserta as $data): ?>
                <div class="flex">
                    <label class="w-[180px]">
                        <?= htmlspecialchars($data->isi_pertanyaan, ENT_QUOTES, 'UTF-8') ?>
                    </label>
                    <span>:</span>
                    <input
                        aria-label="<?= htmlspecialchars($data->isi_pertanyaan, ENT_QUOTES, 'UTF-8') ?>"
                        class="ml-2 border-b border-black flex-grow outline-none"
                        type="<?= htmlspecialchars($data->jenis_jawaban_pertanyaan, ENT_QUOTES, 'UTF-8') ?>"
                        name="<?= htmlspecialchars($data->id_pertanyaan, ENT_QUOTES, 'UTF-8') ?>"
                        value="<?= isset($data->nilai_tersimpan) ? htmlspecialchars($data->nilai_tersimpan, ENT_QUOTES, 'UTF-8') : '' ?>"
                        required />
                </div>
            <?php endforeach; ?>
            <div class="flex justify-end mt-4">
                <button class="bg-[#6a8a3a] text-white text-[14px] font-semibold rounded px-4 py-2 tracking-widest" type="submit">
                    Kirim Formulir
                </button>
        </form>
    </div>
</body>

</html>