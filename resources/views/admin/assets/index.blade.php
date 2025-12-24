<x-layouts.admin title="Assets" header="Assets">
    <div class="space-y-4 sm:space-y-6">
        <!-- Success/Error Messages -->
        @if (session('success'))
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-sm text-green-800">{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                <div class="flex items-center gap-3 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm font-medium text-red-800">Please fix the following errors:</span>
                </div>
                <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Header with Upload Button -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <p class="text-sm sm:text-base text-gray-600">Manage your media assets and files</p>
            </div>
            <button type="button" onclick="openUploadModal()" class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition-colors text-sm font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Upload Asset
            </button>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-lg border border-gray-200 p-4">
            <form method="GET" action="{{ route('admin.assets.index') }}" class="flex flex-col sm:flex-row gap-3">
                <!-- Search -->
                <div class="flex-1">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}"
                        placeholder="Search by title..." 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-800 focus:border-gray-800 transition-colors text-sm"
                    />
                </div>
                
                <!-- Type Filter -->
                <div class="sm:w-48">
                    <select name="type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-800 focus:border-gray-800 transition-colors text-sm">
                        <option value="">All Types</option>
                        @foreach($types as $key => $label)
                            <option value="{{ $key }}" {{ request('type') == $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Status Filter -->
                <div class="sm:w-40">
                    <select name="active" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-800 focus:border-gray-800 transition-colors text-sm">
                        <option value="" {{ !request()->has('active') || request('active') === '' ? 'selected' : '' }}>All Status</option>
                        <option value="1" {{ request('active') == '1' ? 'selected' : '' }}>Active Only</option>
                        <option value="0" {{ request('active') == '0' ? 'selected' : '' }}>Inactive Only</option>
                    </select>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition-colors text-sm font-medium whitespace-nowrap">
                    Filter
                </button>
                
                @if(request()->hasAny(['search', 'type', 'active']))
                    <a href="{{ route('admin.assets.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium whitespace-nowrap flex items-center justify-center">
                        Clear
                    </a>
                @endif
            </form>
        </div>

        <!-- Assets Grid -->
        @if($assets->count() > 0)
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3">
                @foreach($assets as $asset)
                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                        <!-- Asset Preview -->
                        <div class="h-32 sm:h-36 bg-gray-100 relative group">
                            @if(in_array($asset->type, ['image', 'icon', 'svg']))
                                <img 
                                    src="{{ $asset->getThumbnailUrl(200) }}" 
                                    alt="{{ $asset->title }}"
                                    class="w-full h-full object-cover"
                                    loading="lazy"
                                />
                            @elseif($asset->type === 'video')
                                <div class="w-full h-full flex items-center justify-center bg-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 sm:w-12 sm:h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 sm:w-12 sm:h-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Overlay Actions -->
                            <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-1.5">
                                <a href="{{ $asset->file_path_url }}" target="_blank" class="p-1.5 bg-white rounded hover:bg-gray-100 transition-colors" title="View">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <button onclick="editAsset({{ $asset->id }})" class="p-1.5 bg-white rounded hover:bg-gray-100 transition-colors" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button onclick="deleteAsset({{ $asset->id }}, '{{ $asset->title }}')" class="p-1.5 bg-red-500 rounded hover:bg-red-600 transition-colors" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                            
                            <!-- Status Badge -->
                            @if(!$asset->is_active)
                                <div class="absolute top-1.5 right-1.5">
                                    <span class="px-1.5 py-0.5 text-[10px] font-medium text-gray-700 bg-gray-200 rounded">Inactive</span>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Asset Info -->
                        <div class="p-2 sm:p-3">
                            <div class="flex items-start justify-between gap-1.5 mb-1">
                                <h3 class="text-xs sm:text-sm font-medium text-gray-900 truncate flex-1">{{ $asset->title }}</h3>
                                <span class="px-1.5 py-0.5 text-[10px] sm:text-xs font-medium text-gray-700 bg-gray-100 rounded flex-shrink-0">{{ ucfirst($asset->type) }}</span>
                            </div>
                            <p class="text-[10px] sm:text-xs text-gray-500">{{ $asset->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($assets->hasPages())
                <div class="pt-4">
                    {{ $assets->links() }}
                </div>
            @endif
        @else
            <div class="bg-white rounded-lg border border-gray-200 p-12 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">No assets found</h3>
                <p class="text-sm text-gray-600 mb-4">Get started by uploading your first asset</p>
                <button type="button" onclick="openUploadModal()" class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition-colors text-sm font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Upload Asset
                </button>
            </div>
        @endif
    </div>

    <!-- Upload Modal -->
    <div id="uploadModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/50" onclick="closeUploadModal()"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-md max-h-[90vh] overflow-y-auto">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">Upload Asset</h2>
                        <button onclick="closeUploadModal()" class="p-2 rounded-lg hover:bg-gray-100 transition-colors text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    
                    <form id="uploadForm" method="POST" action="{{ route('admin.assets.store') }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        
                        <!-- File Input -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">File</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-gray-400 transition-colors">
                                <input 
                                    type="file" 
                                    name="file" 
                                    id="fileInput"
                                    required
                                    class="hidden"
                                    onchange="handleFileSelect(event)"
                                    accept="image/*,video/*,.pdf,.doc,.docx,.svg"
                                />
                                <div id="filePreview" class="hidden mb-4">
                                    <img id="previewImage" src="" alt="Preview" class="max-w-full max-h-48 mx-auto rounded-lg">
                                </div>
                                <div id="filePlaceholder">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="text-sm text-gray-600 mb-2">Click to upload or drag and drop</p>
                                    <p class="text-xs text-gray-500">Max file size: 50MB</p>
                                </div>
                                <button 
                                    type="button" 
                                    onclick="document.getElementById('fileInput').click()"
                                    class="mt-4 px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition-colors text-sm font-medium"
                                >
                                    Select File
                                </button>
                            </div>
                            <p id="fileName" class="mt-2 text-sm text-gray-600"></p>
                        </div>
                        
                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title (optional)</label>
                            <input 
                                type="text" 
                                name="title" 
                                id="title"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-800 focus:border-gray-800 transition-colors text-sm"
                                placeholder="Auto-generated from filename"
                            />
                        </div>
                        
                        <!-- Type -->
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Type (optional)</label>
                            <select 
                                name="type" 
                                id="type"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-800 focus:border-gray-800 transition-colors text-sm"
                            >
                                <option value="">Auto-detect</option>
                                @foreach($types as $key => $label)
                                    <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Folder -->
                        <div>
                            <label for="folder" class="block text-sm font-medium text-gray-700 mb-2">Folder (optional)</label>
                            <input 
                                type="text" 
                                name="folder" 
                                id="folder"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-800 focus:border-gray-800 transition-colors text-sm"
                                placeholder="e.g., images/products"
                            />
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="flex gap-3 pt-4">
                            <button 
                                type="button" 
                                onclick="closeUploadModal()"
                                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium"
                            >
                                Cancel
                            </button>
                            <button 
                                type="submit" 
                                class="flex-1 px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition-colors text-sm font-medium"
                            >
                                Upload
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/50" onclick="closeEditModal()"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">Edit Asset</h2>
                        <button onclick="closeEditModal()" class="p-2 rounded-lg hover:bg-gray-100 transition-colors text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    
                    <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PUT')
                        
                        <!-- File Upload (Optional - to replace existing file) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Replace File (Optional)
                                <span class="text-xs font-normal text-gray-500 ml-1">- Leave empty to keep current file</span>
                            </label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-gray-400 transition-colors">
                                <input 
                                    type="file" 
                                    name="file" 
                                    id="edit_fileInput"
                                    class="hidden"
                                    onchange="handleEditFileSelect(event)"
                                    accept="image/*,video/*,.pdf,.doc,.docx,.svg"
                                />
                                <div id="edit_filePreview" class="hidden mb-3">
                                    <img id="edit_previewImage" src="" alt="Preview" class="max-w-full max-h-32 mx-auto rounded-lg">
                                </div>
                                <div id="edit_filePlaceholder">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="text-xs text-gray-600 mb-1">Click to upload a new file</p>
                                    <p class="text-[10px] text-gray-500">Leave empty to keep current file</p>
                                </div>
                                <button 
                                    type="button" 
                                    onclick="document.getElementById('edit_fileInput').click()"
                                    class="mt-2 px-3 py-1.5 bg-gray-900 text-white rounded hover:bg-gray-800 transition-colors text-xs font-medium"
                                >
                                    Select New File
                                </button>
                            </div>
                            <p id="edit_fileName" class="mt-1 text-xs text-gray-600"></p>
                        </div>
                        
                        <!-- Title -->
                        <div>
                            <label for="edit_title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                            <input 
                                type="text" 
                                name="title" 
                                id="edit_title"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-800 focus:border-gray-800 transition-colors text-sm"
                            />
                        </div>
                        
                        <!-- Type -->
                        <div>
                            <label for="edit_type" class="block text-sm font-medium text-gray-700 mb-2">Type</label>
                            <select 
                                name="type" 
                                id="edit_type"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-800 focus:border-gray-800 transition-colors text-sm"
                            >
                                @foreach($types as $key => $label)
                                    <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Active Status -->
                        <div>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    name="is_active" 
                                    id="edit_is_active"
                                    value="1"
                                    class="w-4 h-4 rounded border-gray-300 text-gray-800 focus:ring-gray-800"
                                />
                                <span class="text-sm text-gray-700">Active</span>
                            </label>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="flex gap-3 pt-4">
                            <button 
                                type="button" 
                                onclick="closeEditModal()"
                                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium"
                            >
                                Cancel
                            </button>
                            <button 
                                type="submit" 
                                class="flex-1 px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition-colors text-sm font-medium"
                            >
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openUploadModal() {
            document.getElementById('uploadModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        
        function closeUploadModal() {
            document.getElementById('uploadModal').classList.add('hidden');
            document.body.style.overflow = '';
            document.getElementById('uploadForm').reset();
            document.getElementById('filePreview').classList.add('hidden');
            document.getElementById('filePlaceholder').classList.remove('hidden');
            document.getElementById('fileName').textContent = '';
        }
        
        function handleFileSelect(event) {
            const file = event.target.files[0];
            if (file) {
                document.getElementById('fileName').textContent = file.name;
                
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('previewImage').src = e.target.result;
                        document.getElementById('filePreview').classList.remove('hidden');
                        document.getElementById('filePlaceholder').classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    document.getElementById('filePreview').classList.add('hidden');
                    document.getElementById('filePlaceholder').classList.remove('hidden');
                }
            }
        }
        
        function editAsset(id) {
            fetch(`/admin/assets/${id}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
                .then(response => {
                    if (!response.ok) {
                        return response.text().then(text => {
                            throw new Error(`HTTP ${response.status}: ${text.substring(0, 100)}`);
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('editForm').action = `/admin/assets/${id}`;
                    document.getElementById('edit_title').value = data.title || '';
                    document.getElementById('edit_type').value = data.type || '';
                    document.getElementById('edit_is_active').checked = data.is_active || false;
                    
                    // Show current file preview if it's an image
                    if (data.file_path_url && (data.type === 'image' || data.type === 'icon' || data.type === 'svg')) {
                        document.getElementById('edit_previewImage').src = data.file_path_url;
                        document.getElementById('edit_filePreview').classList.remove('hidden');
                        document.getElementById('edit_filePlaceholder').classList.add('hidden');
                    } else {
                        document.getElementById('edit_filePreview').classList.add('hidden');
                        document.getElementById('edit_filePlaceholder').classList.remove('hidden');
                    }
                    
                    document.getElementById('editModal').classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                })
                .catch(error => {
                    console.error('Error loading asset:', error);
                    alert('Failed to load asset details. Please check the console for more details.');
                });
        }
        
        function handleEditFileSelect(event) {
            const file = event.target.files[0];
            if (file) {
                document.getElementById('edit_fileName').textContent = file.name;
                
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('edit_previewImage').src = e.target.result;
                        document.getElementById('edit_filePreview').classList.remove('hidden');
                        document.getElementById('edit_filePlaceholder').classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    document.getElementById('edit_filePreview').classList.add('hidden');
                    document.getElementById('edit_filePlaceholder').classList.remove('hidden');
                }
            }
        }
        
        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.body.style.overflow = '';
            // Reset file input
            document.getElementById('edit_fileInput').value = '';
            document.getElementById('edit_filePreview').classList.add('hidden');
            document.getElementById('edit_filePlaceholder').classList.remove('hidden');
            document.getElementById('edit_fileName').textContent = '';
        }
        
        function deleteAsset(id, title) {
            if (confirm(`Are you sure you want to delete "${title}"? This action cannot be undone.`)) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/assets/${id}`;
                form.innerHTML = `
                    @csrf
                    @method('DELETE')
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</x-layouts.admin>

