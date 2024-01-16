<tr>
 

        <th scope="row">{{ $company->id; }}</th>
        <td>{{ $company->name; }}</td>
        <td>{{ $company->email; }}</td>
        <td>{{ $company->website; }}</td>
        <td><img src="{{ asset($company->getLogo())}}" alt="company logo"></td>
    <td class="d-flex flex-row justify-content-around"> 
        <form action="{{route('companies.show',$company->id)}}">
            @method('get')
            @csrf
        <button type="submit">Details</button>
    </form>
        <form action="{{route('companies.edit', $company->id)}}">
            @method('put')
            @csrf
            <button class="btn-warning" type="submit">Edit</button>
        </form>
        <form action="{{route('companies.destroy', $company->id)}}">
            @method('delete')
            @csrf
            <button class="btn-danger"  type="submit">Delete</button>
        </form>
    </td>
  </tr>