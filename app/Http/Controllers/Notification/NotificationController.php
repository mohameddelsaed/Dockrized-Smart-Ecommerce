<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;

use App\Http\Resources\NotificationResource;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function index(Request $request): JsonResponse
    {
        return response()->json(
            NotificationResource::collection($request->user()->notifications)
        );
    }

    public function unread(Request $request): JsonResponse
    {
        return response()->json(
            NotificationResource::collection($request->user()->unreadNotifications)
        );
    }

    public function markAsRead(Request $request, string $id): JsonResponse
    {
        $notification = $request->user()->notifications()->findOrFail($id);
        $notification->markAsRead();

        return response()->json(new NotificationResource($notification));
    }

    public function markAllAsRead(Request $request): JsonResponse
    {
        $request->user()->unreadNotifications->markAsRead();

        return response()->json(['message' => 'All notifications marked as read.']);
    }

    public function destroy(Request $request, string $id): JsonResponse
    {
        $request->user()->notifications()->findOrFail($id)->delete();

        return response()->json(null, 204);
    }

}
