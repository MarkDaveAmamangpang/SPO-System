<form method="post" action="{{ route('documents.store') }}" enctype="multipart/form-data">
    @csrf
    <div>
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Upload Documents</h2>
        <input
            class="block w-full mb-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:outline-none dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            id="file" name="file" type="file" accept=".pdf,.doc,.docx,.jpeg,.png">
        <input
            class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg focus:outline-none dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            id="filename" name="filename" type="text" placeholder="Add a File Name">
        <button
            class="block w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-lg hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition duration-150 ease-in-out"
            type="submit">Upload Documents</button>
    </div>
</form>
