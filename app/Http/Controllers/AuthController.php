<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    
#Signup es el registro de la aplicacion ----Dobri Rusekov
public function signup(Request $request)
{
    $rules = [
        'id'           => 'required|integer',
        'usuario'      => 'required',
        'password'     => 'required',
        'nombre'       => 'required',
        'email'        => 'required',
        'rol'          => 'required',
        'img'          => 'required',
    ];
    #Paso1-. Validación de los campos del usuario
    $input = $request->all();
    $validator = Validator::make($input, $rules);
//        dd($validator->errors());
    if ($validator->fails()){
        return response()->json([
            'status' => 'error',
            'message' => 'Error en la validación de los datos',
            'errors'=> $validator->errors()
        ], 200);
    }

    #Paso3-. Los datos son correctos, encriptamos la contraseña
   // request()->merge(['password' => bcrypt(request('password'))]);

    #Paso4-. Creamos y almacenamos en la BD el objeto usuario con los campos que vienen en la Request

   // $user = New user([

    $user = Usuario::create(array(
        'id'           => $request->input('id'),
        'usuario'      => $request->input('usuario'),
        'password'     => bcrypt($request->password),
        'nombre'       => $request->input('nombre'),
        'email'        => $request->input('email'),
        'rol'          => $request->input('rol'),
        'img'          => $request->input('img')
    ));

   // dd($user);

    $user['id'] = (int)($request->input('id'));
    $user->save();

    #Paso5-. Creamos el token y lo almacenamos en oauth_access_tokens.
    $tokenAuth = $user->createToken('task api');
  //  dd($tokenAuth);


    $token = $tokenAuth->accessToken;
    $tokenAuth->token->user_id = $user['id'];
    $tokenAuth->token->save();
  //  dd($tokenAuth);

    #Paso5-.Devolvemos un mensaje de usuario creado o devolver el token
    return response()->json([
        'status' => 'success',
        'message' => 'Successfully created user!'], 201);

}

public function login(Request $request){

    #Paso1-. validamos el  email/pasword que viene del password
    $request->validate([
        'usuario' => 'required|string',
        'password' => 'required|string'
    ]);

    #Paso2-. Creamos el array de credenciales --> ['email => $email, 'password'=>$password] con el método Auth::attemp
    $credentials = request(['usuario', 'password']);

    //dd($credentials);

    #Paso3-. Verificamos si las credenciales no son válidas se devuelve un mensaje de error
    #se chequea en la tabla User sis existe el email/password
    if(!Auth::attempt($credentials)){
        return response()->json([
            'status' => 'error',
            'message' => 'Credenciales Incorrectas', 'code' => 401
        ]);
    }

    #Paso4-. Las credenciales son válidas y se saca el usuario (registro de la tabla usuario)
    #con el email/password que viene de la request
    $user = Auth::user();
    //  $user = $request->user();
    //  dd($user);

    #Paso5-. Generar el TOKEN del usuario
    # una vez que el usuario se ha logeado generamos el TOKEN que posteriormente el usuario usará para acceder
    # a nuestra REST API
    $tokenAuth = $user->createToken('Personal Access Token');
    //dd ($tokenAuth);
    $token = $tokenAuth->accessToken;
    #asociamos el user_id del token al user_id del usuario logeado
    $tokenAuth->token->user_id = $user['id'];

    #Por defecto la vigencia del token es de un año.
    #En este caso añadimos 1 semana mas a la vigencia del token después del logeo
    $tokenAuth->token->expires_at = Carbon::now()->addWeeks(1);
    #almacenamos el token en la tabla oauth_access_tokens
    $tokenAuth->token->save();

    #Paso6-. Generar el token y las características necesarias para el usuario
    # datos necesarios para que el usuario realize las consultas porsteriores a la REST API

   // $usuario = Usuario::with('cliente')->find($user->id);

    return response()->json([
       'status' => 'success',
       'user' => $user,
       'token' => [
            'access_token' => $token,
            'token_type' => 'Bearer ',
            'expires_at' => Carbon::parse($tokenAuth->token->expires_at)->toDateTimeString()
       ]

   ]);

}



public function getUser(Request $request) {

    //$user = $request->user();
      $user = Auth::user();
      echo $user->id;
     // $usuario = User::where('id', $user->id)->with('cliente')->get();
     // $usuario = User::with('cliente')->find($user->id);
    $usuario = User::with('persona')->find($user->id);
      return  response()->json([
          'status' => 'success',
          'message' => 'Datos del usuario',
          'code' => 401,
          'user' => $user
      ]);
  }





    
    public function logout(Request $request){
        //elimina el token de oauth_access_token.
        $request->user()->token()->revoke();
        return  response()->json([
            'message' => 'Sesión finalizada con éxito',
        ]);
    }
}