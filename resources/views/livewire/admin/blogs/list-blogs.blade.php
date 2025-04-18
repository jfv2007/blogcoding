<div>
    

    <div class="flex" >
        <div
            wire:loading wire:targe ="images" >Uploading....
        </div>
        <form wire:submit.prevent="save">
            <input type="file" wire:model="images" multiple>

            @error('images.*')
                <span class="error">{{ $message }}</span>
            @enderror

            <button type="submit"class="bg-blue-300 p-2 rounded-lg">Save Photo</button>
        </form>
    </div>

</div>
