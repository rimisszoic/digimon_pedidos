/**
 * Class InstallerController
 *
 * Handles the installation process of the application, including environment configuration,
 * database setup, and admin user creation.
 *
 * Methods:
 * - index(): Displays the installation view.
 * - configure(Request $request): Validates installation input, updates the .env file with
 *   database and admin credentials, runs migrations and seeders, and generates JWT secret.
 *
 * Usage:
 * This controller is typically used during the initial setup of the application to ensure
 * all necessary configuration and database setup steps are completed.
 *
 * @package App\Http\Controllers
 */
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Exception;

class InstallerController extends Controller
{
    /**
     * Display the installation index view.
     *
     * This method returns the main installation page for the application.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('install.index');
    }

    /**
     * Handles the configuration step of the installer.
     *
     * Validates the incoming request for required database and admin credentials,
     * updates the application's .env file with the provided values, and runs
     * necessary Artisan commands to clear configuration, migrate the database,
     * seed initial data, and generate a JWT secret.
     *
     * @param  \Illuminate\Http\Request  $request  The incoming HTTP request containing configuration data.
     * @return \Illuminate\Http\RedirectResponse   Redirects back with errors on failure, or to login on success.
     */
    public function configure(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'db_host' => 'required',
            'db_port' => 'required|numeric',
            'db_name' => 'required',
            'db_user' => 'required',
            'db_pass' => 'nullable',
            'admin_name' => 'required',
            'admin_email' => 'required|email',
            'admin_password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $envPath = base_path('.env');
        $envContent = file_get_contents($envPath);

        $reemplazos = [
            'DB_HOST=' => 'DB_HOST=' . $request->db_host,
            'DB_PORT=' => 'DB_PORT=' . $request->db_port,
            'DB_DATABASE=' => 'DB_DATABASE=' . $request->db_name,
            'DB_USERNAME=' => 'DB_USERNAME=' . $request->db_user,
            'DB_PASSWORD=' => 'DB_PASSWORD=' . $request->db_pass,
            'ADMIN_NAME=' => 'ADMIN_NAME=' . $request->admin_name,
            'ADMIN_EMAIL=' => 'ADMIN_EMAIL=' . $request->admin_email,
            'ADMIN_PASSWORD=' => 'ADMIN_PASSWORD=' . $request->admin_password,
        ];

        foreach ($reemplazos as $clave => $nuevo) {
            $envContent = preg_replace("/^{$clave}.*$/m", $nuevo, $envContent);
        }

        file_put_contents($envPath, $envContent);

        try {
            Artisan::call('config:clear');
            Artisan::call('migrate:fresh', ['--force' => true]);
            Artisan::call('db:seed', ['--force' => true]);
            Artisan::call('jwt:secret', ['--force' => true]);
        } catch (Exception $e) {
            return back()->with('error', 'Error durante la instalaci&oacute;n: ' . $e->getMessage());
        }

        return redirect('/login')->with('success', 'Instalaci&oacute;n completada con &eacute;xito');
    }
}
?>