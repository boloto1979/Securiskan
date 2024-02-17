<div class="max-w-lg mx-auto text-center">
    <h2 class="mb-8 text-2xl font-bold text-gray-700">File Analysis Upload</h2>
    <form id="upload-form" action="/upload" method="post" enctype="multipart/form-data" class="p-8 bg-white rounded-lg shadow">
        @csrf
        <label for="file-upload" class="px-4 py-2 font-medium text-gray-800 bg-gray-100 border border-gray-300 rounded-lg cursor-pointer hover:border-gray-400">Upload File</label>
        <input id="file-upload" class="hidden" type="file" name="file" required>
    </form>
    <div id="progress-bar" class="hidden mt-4 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 0%"></div>
    </div>
</div>
<div id="analysis-result" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50" style="backdrop-filter: blur(5px);">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-bold">Analysis Result</h3>
            <button onclick="closePopup()" class="text-gray-400 transition duration-150 ease-in-out hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <p id="result-text" class="text-gray-600">Your file is safe.</p>
    </div>
</div>

<script>
    document.getElementById('file-upload').addEventListener('change', function(e) {
        let file = e.target.files[0];
        let formData = new FormData();
        formData.append('file', file);

        document.getElementById('progress-bar').classList.remove('hidden');

        fetch('/upload', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            } else {
                return response.json();
            }
        })
        .then(data => {
            document.getElementById('result-text').textContent = data.message;
            document.getElementById('analysis-result').classList.remove('hidden');
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('result-text').textContent = 'There was an error processing your file.';
            document.getElementById('analysis-result').classList.remove('hidden');
        })
        .finally(() => {
            document.getElementById('progress-bar').classList.add('hidden');
        });
    });

    function closePopup() {
        document.getElementById('analysis-result').classList.add('hidden');
        window.location.reload();
    }
    </script>

