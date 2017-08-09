<?php

namespace App\Http\Controllers\Painel;

//use Validator;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;
use App\Http\Requests\Painel\ProductFormRequest;

class ProdutoController extends Controller
{
	private $product;
        private $total_page = 3;
        
	public function __construct(Product $product) {
		$this->product = $product;
	}

    public function index()
	{
        
	  $title = 'Listagem dos produtos';
          
          //Localizando o produto de acordo com a empresa cadastrada
          //$AccountId = \Auth::user()->account_id;
	  $products = Product::all();          
	  return view('Painel.products.index', compact('products', 'title'));
          
	}

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {	
  	$title = 'Cadastrar Novo Produto';

  	$categorys = ['eletronicos', 'moveis', 'limpeza', 'banho'];

    	return view('Painel.products.create-edit', compact('title', 'categorys'));
        
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(ProductFormRequest $request)
  {
        //dd($request->all());
        //dd($request->only('name', 'number'));
        //dd($request->except('_token', 'category'));
        //dd($request->input('name'));
        
        // Pega todos os dados do formulário
        $dataForm = $request->all();

        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;

        //Valida os dados
        //$this->validate($request, $this->product->rules, $this->product->messages());
        
        /*
        $validate = Validator::make($dataForm, $this->product->rules, $this->product->messages());
        if($validate->fails()) {
            return redirect()
                    ->routeTenant('produtos.create')
                    ->withErrors($validate)
                    ->withInput();
        }
        */
        
        // Faz o cadastro
        $insert = $this->product->create($dataForm);
        
        if($insert):
            return redirect()->routeTenant('produtos.index');
        else:
            return redirect()->routeTenant('produtos.create');
        endif;
        
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $product = $this->product->find($id);
    
    $title = "Produto: {$product->name}";
    
    return view('Painel.products.show', compact('product', 'title'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {   
      // Recupera produto pelo id
      $product = $this->product->find($id);
      
      $title = "Editar Produto: {$product->name}";

      $categorys = ['Selecione a Categoria','eletronicos', 'moveis', 'limpeza', 'banho'];
      
      return view('Painel.products.create-edit', compact('title', 'categorys', 'product'));
      
      
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(ProductFormRequest $request, $id)
  {     
        // Recupera todos os dados do formulário
        $dataForm = $request->all();
        
        // Recupera o produto pelo id
    	$product = $this->product->find($id);
        
        // Verifica se está ativo o status
        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;
        
        // Chama o método update para atualizar os dados
        $update = $product->update($dataForm);
        
        if($update) {
            return redirect()->routeTenant('produtos.index');
        }else{
            return redirect()->routeTenant('produtos.edit', $id->with(['errors' => 'Falha ao editar']));
        }
            
            
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $product = $this->product->find($id);
    
    $delete = $product->delete();
    
    if($delete) {
        return redirect()->routeTenant('produtos.index');
    }else{
        return redirect()->routeTenant('produtos.show', $id)->with(['errors' => 'Falha ao deletar']);
    }
  }

  public function tests()
  {
   //  	$this->product->create([
   //  		'name' => 'Bermuda Nike',
			// 'description' => 'Bermuda Jeans',
			// 'number' => '12345678',
			// 'active' => 1,
			// 'image' => 'djahdasuhashase.jpg',
			// 'category' => 'limpeza'
   //      ]);

  	// $prod = $this->product->find(3);
  	// $prod->name = 'Boné Addidas';
  	// $prod->number = '12345678';
  	// $prod->active = 1;
  	// $prod->category = 'limpeza';
  	// $prod->description = 'Teste Boné';

  	// $prod->save();

  // 	$prod = $this->product->where('number', 12345678);
  // 	$prod->update([
  // 		'name' => 'Teste Addidas',
		// 'description' => 'Teste Tactel',
		// 'number' => '12345678',
		// 'active' => 1,
		// 'image' => 'djahdasuhashase.jpg',
		// 'category' => 'limpeza'
  // 	]);

  	// $prod = $this->product->find(3);
  	// $delete = $prod->delete();

    //dd($this->product->all());

  }
}
