<div class="form-group">
        <ul id="permissions" class="list-group-item">
            @foreach ($permissions as $permission)
    
            <li>
                <label >
                  {{ Form::checkbox('permissions[]', $permission->id, null) }}  
                  {{ $permission->name }}
                  <em>({{ $permission->description ?: 'N/A'  }})</em>
                </label>
                
            </li>
                
            @endforeach
        </ul>
        {{ $permissions->Render() }}
    </div>