<?php

namespace App\Http\Controllers\api;

use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;
use App\Http\Controllers\Controller;

class PassportController extends Controller
{

    /**
     * Register user.
     *
     * @return json
     */

    /**
     *
     * @OA\Post(
     * path="/login",
     * summary="Sign in",
     * description="Login by email, password to get access token",
     * operationId="authLogin",
     * tags={"Access Token"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Account login credentials",
     *    @OA\JsonContent(
     *       required={"email","password"},
     *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
     *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
     *
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Successful Login",
     *    @OA\JsonContent(
     *       @OA\Property(property="success", type="boolean", example="true"),
     *       @OA\Property(property="message", type="string", example="User login succesfully, Use token to authenticate."),
     *       @OA\Property(property="token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiODQ3MThkNTZjZTZiYWI2OGFmNDgwZjlmNjA4NTA4NGU5M2NhY2JiMjRmZWU4ZWQzZGE0YTQ4OGQ1ZTRlM2NiN2RlNmRmN2VkYjY5ZjhjZjciLCJpYXQiOjE2NzQzNzg3MjEsIm5iZiI6MTY3NDM3ODcyMSwiZXhwIjoxNzA1OTE0NzIxLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.d7D4ZXHxRZ8D44noKOOtzkMBlYbd8sDMQLIxwlOHc_RAqG64SbuRHWQzg7DPG9WqlKiBFF53LxLT6lQScmml5uanneTVCB9LKdzMP9WpXDS1OHklepPgdiuXaWbvH5k226uDEl1QfCL3EJoFICRQE7CW-4UCsjpP08XOiIDblc2UnPdJWW6wyWgf0xS5VGAwTRc_PzWNLIWcustebWhT9Od9blVyz_yeyQ9fRKBBScHiWvcOKwfn1dHrMDmtlJsM_B4mR-csxez9Zun05SjyhegQI2Q1Ldi1SWshi4BSBm70DS3CuKBAdP5Py9aoNHjyM-4ow_z57ozbuRqTT3-6qPbNTW85zYSAS0g_VSkla2iyhiRN_GyiLwp7-F1iqvoElU1Os63popaYUo7Dbg3JSXQGbClXlCHMCFwaofDBgfuMmz-qAdiCFoYGqkWb9iZSjz57wRUuH3HoXYpJ7QfP-YwUGKMKdyEYsYdM9wz3jHwgZHUay-2YPQHFPhRwkm3wQwWkGH4C-n4PNprOJrXiTYIJqQ95WowEq0VY8Wljr_0RAb5_cJUtjlwIfafcTrXQkY6ZQ6NFikUlRLpDUDjSl9cDvQIxFoUuzlxwVGfSzy6PL-k4m_kTWABJeYb_lDLlF5AoDVBGum6h472jbhEiIspci9R7srWUw7S")
     *        )
     *     )
     * ),
     * @OA\Response(
     *    response=401,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="success", type="boolean", example="false"),
     *       @OA\Property(property="message", type="string", example="User authentication failed.")
     *        )
     *     ),
     * ),
     *
     *
     *
     * @OA\Post(
     * path="/register",
     * summary="Registration",
     * description="To create a new user on the system",
     * operationId="registration",
     * tags={"User Creation"},
     * @OA\RequestBody(
     *    required=true,
     *    description="User Details",
     *    @OA\JsonContent(
     *       required={"name","email","password"},
     *       @OA\Property(property="firstname", type="string", format="text", example="John"),
     *       @OA\Property(property="middlename", type="string", format="text", example="Elfa"),
     *       @OA\Property(property="lastname", type="string", format="text", example="Emmanuel"),
     *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
     *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
     *
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Successful Registration",
     *    @OA\JsonContent(
     *       @OA\Property(property="success", type="boolean", example="true"),
     *       @OA\Property(property="message", type="string", example="User registered succesfully, Use Login method to receive token.")
     *        )
     *     )
     * ),
     * @OA\Response(
     *    response=402,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="success", type="boolean", example="false"),
     *       @OA\Property(property="message", type="string", example="User authentication failed.")
     *        )
     *     ),
     * )
     *
     *
     *
     *
     *
     * @OA\Get(
     * path="/articles",
     * summary="View List of article",
     * description="To Display all article",
     * operationId="articles_view",
     * tags={"Lis of created articles"},
     * security={{"bearer_token":{}}},

     * @OA\Response(
     *    response=200,
     *    description="Successful Product Update",
     *    @OA\JsonContent(
     *
     *       @OA\Property(property="id", type="string", example="1"),
     *       @OA\Property(property="cover", type="string", example="https://imgd.aeplcdn.com/1200x900/n/cw/ec/110233/2022-camry-exterior-right-front-three-quarter.jpeg?isig=0&q=75"),
     *       @OA\Property(property="full_text", type="string", example="jdsndj  ksjdnkjn kjsnd"),
     *       @OA\Property(property="likes", type="integer", example="0"),
     *       @OA\Property(property="views", type="integer", example="0"),
     *       @OA\Property(property="created_at", type="string", example="2023-01-22T13:33:14.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2023-01-22T13:33:14.000000Z"),
     *
     *        )
     *     )
     * ),
     *
     * @OA\Get(
     * path="/articles/{article_id}",
     * summary="View article using id",
     * description="To display article when an article id is inserted",
     * operationId="view_article",
     * tags={"View article by article ID"},
     * security={{"bearer_token":{}}},
     * @OA\Parameter(
     *          name="article_id",
     *          description="Article id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     * @OA\Response(
     *    response=200,
     *    description="Successful Article",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="string", example="1"),
     *       @OA\Property(property="cover", type="string", example="https://imgd.aeplcdn.com/1200x900/n/cw/ec/110233/2022-camry-exterior-right-front-three-quarter.jpeg?isig=0&q=75"),
     *       @OA\Property(property="full_text", type="string", example="jdsndj  ksjdnkjn kjsnd"),
     *       @OA\Property(property="likes", type="integer", example="0"),
     *       @OA\Property(property="views", type="integer", example="0"),
     *       @OA\Property(property="created_at", type="string", example="2023-01-22T13:33:14.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2023-01-22T13:33:14.000000Z"),
     *
     *        )
     *     )
     * ),
     *
     *
     *
     *
     * @OA\Post(
     * path="/articles",
     * summary="Add Article",
     * description="To create a new article on the system",
     * operationId="add_article",
     * tags={"Create new article"},
     * security={{"bearer_token":{}}},
     * @OA\RequestBody(
     *    required=true,
     *    description="Article Information",
     *    @OA\JsonContent(
     *       required={"name","email","password"},
     *       @OA\Property(property="full_text", type="string", format="text", example="A test Article"),
     *       @OA\Property(property="cover", type="string", format="text", example="https://imgd.aeplcdn.com/1200x900/n/cw/ec/110233/2022-camry-exterior-right-front-three-quarter.jpeg?isig=0&q=75"),
     *
     *
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Successful Registration",
     *    @OA\JsonContent(
     *       @OA\Property(property="success", type="boolean", example="true"),
     *       @OA\Property(property="message", type="string", example="Your article has been created"),
     *       @OA\Property(
*              property="data",
*              type="array",
*              collectionFormat="multi",
*              @OA\Items(type="string",
*                    example={"full_text":"Test Article",
 *                            "cover":"http://picture.com/1.jpg",
 *                            "created_at":"2023-01-22T13:33:14.000000Z",
 *                            "created_at":"2023-01-22T13:33:14.000000Z",
 *                            "id":1,
 *                           },
*                 )
*              )
     *        )
     *     )
     * ),
     *
     *
     *
     *
     * @OA\Get(
     * path="/articles/{article_id}/comments",
     * summary="View article comments using id",
     * description="To display article and it's comments when an article id is inserted",
     * operationId="view_article_comment",
     * tags={"View article comments by article ID"},
     * security={{"bearer_token":{}}},
     * @OA\Parameter(
     *          name="article_id",
     *          description="Article id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
            * @OA\Response(
                *    response=200,
                *    description="View Article comments",
                *    @OA\JsonContent(
                *       @OA\Property(property="success", type="boolean", example="true"),
                *       @OA\Property(property="message", type="string", example="Successful"),
                *       @OA\Property(
            *              property="data",
            *              type="array",
            *              collectionFormat="multi",
            *              @OA\Items(type="string",
            *                    example={
                *                        "id":1,
                *                        "article_id":1,
            *                            "comments":"Testing comment",
            *                            "created_at":"2023-01-22T13:33:14.000000Z",
            *                            "created_at":"2023-01-22T13:33:14.000000Z",
            *
            *                           },
            *                 )
            *              )
                *        )
                *     )
     * ),
     *
     *
     *
     *
     *
     *
     * * @OA\Post(
     * path="/articles/{article_id}/comments",
     * summary="add article comments using id",
     * description="To add comments to an article when an article id is inserted",
     * operationId="insert_new_article_comment",
     * tags={"Add comments to article"},
     * security={{"bearer_token":{}}},
     * @OA\Parameter(
     *          name="article_id",
     *          description="Article id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     * @OA\RequestBody(
     *    required=true,
     *    description="User Details",
     *    @OA\JsonContent(
     *       required={"comments"},
     *       @OA\Property(property="comments", type="string", format="text", example="Testing comment insert"),
     *
     *
     *    ),
     * ),
            * @OA\Response(
                *    response=200,
                *    description="Add Comments to Article",
                *    @OA\JsonContent(
                *       @OA\Property(property="success", type="boolean", example="true"),
                *       @OA\Property(property="message", type="string", example="Your comments have been added to this article"),
                *       @OA\Property(
            *              property="data",
            *              type="array",
            *              collectionFormat="multi",
            *              @OA\Items(type="string",
            *                    example={
                *
                *                        "article_id":1,
            *                            "comments":"Testing comment",
            *                            "created_at":"2023-01-22T13:33:14.000000Z",
            *                            "created_at":"2023-01-22T13:33:14.000000Z",
            *                            "id":1,
            *                           },
            *                 )
            *              )
                *        )
                *     )
     * ),
     *
     *
     *
     * * @OA\Get(
     * path="/articles/{article_id}/likes",
     * summary="Show List of Article likes",
     * description="Show list of likes on an article",
     * operationId="show_like",
     * tags={"Show List of Like"},
     * security={{"bearer_token":{}}},
     * @OA\Parameter(
     *          name="article_id",
     *          description="Article id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
            * @OA\Response(
                *    response=200,
                *    description="Show Likes",
                *    @OA\JsonContent(
                *       @OA\Property(property="success", type="boolean", example="true"),
                *       @OA\Property(property="message", type="string", example="total number of like"),
            *            @OA\Property(property="data", type="string", example="2"),
                *
                *        )
                *     )
     * ),
     *
     * * * @OA\Get(
     * path="/articles/{article_id}/views",
     * summary="Show List of Article views",
     * description="Show list of views on an article",
     * operationId="show_views",
     * tags={"Show List of views"},
     * security={{"bearer_token":{}}},
     * @OA\Parameter(
     *          name="article_id",
     *          description="Article id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
            * @OA\Response(
                *    response=200,
                *    description="Show Views",
                *    @OA\JsonContent(
                *       @OA\Property(property="success", type="boolean", example="true"),
                *       @OA\Property(property="message", type="string", example="total number of views"),
            *            @OA\Property(property="data", type="string", example="2"),
                *
                *        )
                *     )
     * ),
     *
     ** * @OA\put(
     * path="/articles/{article_id}/likes",
     * summary="Like an article",
     * description="To like an article",
     * operationId="article_like",
     * tags={"Like an article"},
     * security={{"bearer_token":{}}},
     * @OA\Parameter(
     *          name="article_id",
     *          description="Article id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
            * @OA\Response(
     *    response=200,
     *    description="You just like this article",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="string", example="1"),
     *       @OA\Property(property="cover", type="string", example="https://imgd.aeplcdn.com/1200x900/n/cw/ec/110233/2022-camry-exterior-right-front-three-quarter.jpeg?isig=0&q=75"),
     *       @OA\Property(property="full_text", type="string", example="jdsndj  ksjdnkjn kjsnd"),
     *       @OA\Property(property="likes", type="integer", example="0"),
     *       @OA\Property(property="views", type="integer", example="0"),
     *       @OA\Property(property="created_at", type="string", example="2023-01-22T13:33:14.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2023-01-22T13:33:14.000000Z"),
     *
     *        )
     *     )
     * ),
     *
     * * * @OA\put(
     * path="/articles/{article_id}/views",
     * summary="To view an article",
     * description="View article",
     * operationId="article_view",
     * tags={"View an article"},
     * security={{"bearer_token":{}}},
     * @OA\Parameter(
     *          name="article_id",
     *          description="Article id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
                * @OA\Response(
     *    response=200,
     *    description="You just view this article",
     *    @OA\JsonContent(
     *       @OA\Property(property="id", type="string", example="1"),
     *       @OA\Property(property="cover", type="string", example="https://imgd.aeplcdn.com/1200x900/n/cw/ec/110233/2022-camry-exterior-right-front-three-quarter.jpeg?isig=0&q=75"),
     *       @OA\Property(property="full_text", type="string", example="jdsndj  ksjdnkjn kjsnd"),
     *       @OA\Property(property="likes", type="integer", example="0"),
     *       @OA\Property(property="views", type="integer", example="0"),
     *       @OA\Property(property="created_at", type="string", example="2023-01-22T13:33:14.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2023-01-22T13:33:14.000000Z"),
     *
     *        )
     *     )
     * ),
     *
     */


    public function register(Request $request)
    {
        $input = $request->only(['firstname', 'middlename','lastname', 'email', 'password']);

        $validate_data = [
            'firstname' => 'required|string|min:3',
            'lastname' => 'required|string|min:3',
            'lastname' => 'sometimes|string|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];

        $validator = Validator::make($input, $validate_data);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please see errors parameter for all errors.',
                'errors' => $validator->errors()
            ]);
        }
         $user = new User;
         $user->firstname = $input['firstname'];
         $user->middlename = $input['middlename'];
         $user->lastname = $input['lastname'];
         $user->email = $input['email'];
         $user->password = Hash::make($input['password']);
         $user->save();
        /*$user = User::create([
            'firstname' => $input['firstname'],
             'middlename' => $input['middlename'],
            'lastname' => $input['lastname'],
            'email' => $input['email'],
            'password' => Hash::make($input['password'])
        ]);
        */

        return response()->json([
            'success' => true,
            'message' => 'User registered succesfully, Use Login method to receive token.'
        ], 200);
    }

    /**
     * Login user.
     *
     * @return json
     */
    public function login(Request $request)
    {
        $input = $request->only(['email', 'password']);

        $validate_data = [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];

        $validator = Validator::make($input, $validate_data);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please see errors parameter for all errors.',
                'errors' => $validator->errors()
            ]);
        }

        // authentication attempt
        if (auth()->attempt($input)) {
            $token = auth()->user()->createToken('passport_token')->accessToken;

            return response()->json([
                'success' => true,
                'message' => 'User login succesfully, Use token to authenticate.',
                'token' => $token
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User authentication failed.'
            ], 401);
        }
    }

    /**
     * Access method to authenticate.
     *
     * @return json
     */
    public function userDetail()
    {
        return response()->json([
            'success' => true,
            'message' => 'Data fetched successfully.',
            'data' => auth()->user()
        ], 200);
    }

    /**
     * Logout user.
     *
     * @return json
     */
    public function logout()
    {
        $access_token = auth()->user()->token();

        // logout from only current device
        $tokenRepository = app(TokenRepository::class);
        $tokenRepository->revokeAccessToken($access_token->id);

        // use this method to logout from all devices
        // $refreshTokenRepository = app(RefreshTokenRepository::class);
        // $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($$access_token->id);

        return response()->json([
            'success' => true,
            'message' => 'User logout successfully.'
        ], 200);
    }
}
